<?php

namespace frontend\controllers;

use Yii;
use common\models\News;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;


class NewsController extends \yii\web\Controller
{
    public function actionIndex($page = 1)
    {
		$pageSize = 7;
		$data = News::newsPage($page,$pageSize);
		$pageNum = News::pageNumber($page,$pageSize);
		
		if(empty($data)){
			$this->redirect(['news/index']);
		}
		
        return $this->render('index',[
			'data' => $data,
			'page' => $page,
			'num' => $pageNum,
		]);
    }

    public function actionView($id)
    {
		$model = $this->findModel($id);
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		
		if($model->language != $lng) {
			$this->redirect(['/news/index']);
		}
		
        return $this->render('view',[
			'model' => $model,
		]);
    }
	
	
	
	/**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
