<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ChpwdForm;
use frontend\models\ContactForm;
use common\models\News;
use common\models\Project;
use common\models\User;
use common\models\About;
use common\models\Banner;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'settings', 'chpwd'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'settings', 'chpwd'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		//获得最新新闻
		$news = News::findRecentNews();
		$projects = Project::findRecentProjects();
        $about = About::findHomeAbout();
        $banners = Banner::findBanner();

        return $this->render('index',[
				'news' => $news,
				'projects' => $projects,
                'about' => $about,
                'banners' => $banners,
			]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();

		if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){		//开启ajax验证，在view中，表单需要ajax的选项加['enableAjaxValidation'=>true]选项
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return \yii\widgets\ActiveForm::validate($model);                            //验证在SignupForm模型的rules方法中
		}

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


	//切换语言
	public function actionLanguage($language)
	{
		$session = Yii::$app->session;
		$session->open();
		if(isset($language))
		{
			Yii::$app->session['language'] = $language;
		}
		$this->goBack(Yii::$app->request->headers['Referer']);
	}

	//个人中心
	public function actionSettings()
	{
		$model = $this->findModel(Yii::$app->user->id);

		if ($model->load(Yii::$app->request->post())) {     //&& $model->save()
            $file = UploadedFile::getInstance($model, 'resumeFile');

            if(!empty($file)) {
                $path = iconv("UTF-8", "GBK", 'resume/' . time() .  $file->name);  //将文件路径转换为gbk格式，用于处理上传中文文件名乱码问题，下面转回utf-8保存数据库


                if ($file->saveAs($path) == true) {
                    $path = iconv("GBK","UTF-8",$path);  //转回utf-8保存数据库    这种处理方式到时还得进行测试
                    $model->resume_link = $path;
                }
            }

            if($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', '资料修改成功！'));
            }
            return $this->redirect(['settings', 'id' => $model->id]);

        } else {
            return $this->render('settings', [
                'model' => $model,
            ]);
        }

	}

	//修改密码
	public function actionChpwd()
	{

		//$model = $this->findModel(Yii::$app->user->identity->id);

		$model = new ChpwdForm();

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->session->setFlash('success',Yii::t('app','密码修改成功！'));
			return $this->redirect(['/site/chpwd']);
        } else {
            return $this->render('chpwd', [
                'model' => $model,
            ]);
        }

	}





	/**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
