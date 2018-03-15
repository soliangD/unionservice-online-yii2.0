<?php
/**
 * Created by PhpStorm.
 * User: Sun
 * Date: 2017/7/3
 * Time: 15:14
 */

namespace backend\controllers;

use Yii;
use common\models\About;
use common\models\Banner;
use common\models\WebLink;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class SettingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        //关于我们页面数据
        $aboutData = About::find();
        $aboutDataProvider = new ActiveDataProvider([
            'query' => $aboutData,
        ]);

        //轮播图片数据
        $bannerData = Banner::find();
        $bannerDataProvider = new ActiveDataProvider([
            'query' => $bannerData,
        ]);

        $linkData = WebLink::find();
        $linkDataProvider = new ActiveDataProvider([
            'query' => $linkData,
        ]);


        return $this->render('index', [
            'aboutData' => $aboutDataProvider,
            'bannerData' => $bannerDataProvider,
            'linkData' => $linkDataProvider,
        ]);
    }





    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */

    public function actionAboutView($id)
    {
        return $this->render('aboutView', [
            'model' => $this->findAboutModel($id),
        ]);
    }

    public function actionLinkView($id)
    {
        return $this->render('linkView', [
            'model' => $this->findLinkModel($id),
        ]);
    }

    public function actionBannerView($id)
    {
        return $this->render('bannerView', [
            'model' => $this->findBannerModel($id),
        ]);
    }



    /**
     * Creates a new WebLink model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionLinkCreate()
    {
        $model = new WebLink();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['link-view', 'id' => $model->id]);
        } else {
            return $this->render('linkCreate', [
                'model' => $model,
            ]);
        }
    }

    public function actionBannerCreate()
{
    $model = new Banner();

    if ($model->load(Yii::$app->request->post())) {     //&& $model->save()
        $file = UploadedFile::getInstance($model, 'bannerFile');

        if(!empty($file)) {
            $path = 'banner/banner' . time() . '.' . $file->extension;

            if ($file->saveAs('../../frontend/web/' . $path) == true) {

                $model->img_url = $path;
            }
        }

        $model->save();

        return $this->redirect(['banner-view', 'id' => $model->id]);

    } else {
        return $this->render('bannerCreate', [
            'model' => $model,
        ]);
    }

}



    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionAboutUpdate($id)
    {
        $model = $this->findAboutModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['about-view', 'id' => $model->id]);
        } else {
            return $this->render('aboutUpdate', [
                'model' => $model,
            ]);
        }
    }

    public function actionLinkUpdate($id)
    {
        $model = $this->findLinkModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['link-view', 'id' => $model->id]);
        } else {
            return $this->render('linkUpdate', [
                'model' => $model,
            ]);
        }
    }

    public function actionBannerUpdate($id)
    {
        $model = $this->findBannerModel($id);

        if ($model->load(Yii::$app->request->post())) {     //&& $model->save()
            $file = UploadedFile::getInstance($model, 'bannerFile');

            if(!empty($file)) {
                $path = 'banner/banner' . time() . '.' . $file->extension;

                if ($file->saveAs('../../frontend/web/' . $path) == true) {

                    $model->img_url = $path;
                }
            }

            $model->save();

            return $this->redirect(['banner-view', 'id' => $model->id]);

        } else {
            return $this->render('bannerUpdate', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionAboutDelete($id)
    {
        $this->findAboutModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLinkDelete($id)
    {
        $this->findLinkModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBannerDelete($id)
    {
        $this->findBannerModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAboutModel($id)
    {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findLinkModel($id)
    {
        if (($model = WebLink::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findBannerModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
