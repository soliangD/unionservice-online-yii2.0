<?php

namespace frontend\controllers;

use Yii;
use common\models\Project;
use common\models\Business;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;


class ProjectController extends \yii\web\Controller
{
    public function actionIndex($page = 1)
    {
        //返回业务 id=>name 的数组
        $business = Business::findBusiness();
        $value = array_values($business);

        //获得分页 信息
		$pageSize = 7;
		$data = Project::page($page,$pageSize);
		$pageNum = Project::pageNumber($page,$pageSize);

        //  ! 应增加page参数错误处理

        return $this->render('index',[
			'data' => $data,
			'page' => $page,
			'num' => $pageNum,
            'business' => $value,
		]);
    }

	 public function actionView($id)
    {
        //返回业务 id=>name 的数组
        $business = Business::findBusiness();
        $value = array_values($business);


		$model = $this->findModel($id);
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		
		if($model->language != $lng) {
			$this->redirect(['/project/index']);
		}
		
        return $this->render('view',[
			'model' => $model,
            'business' => $value,
		]);
    }
	
	
	
	/**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app','访问的页面不存在'));
        }
    }
	
}
