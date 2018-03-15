<?php

namespace frontend\controllers;

use Yii;
use common\models\About;
use yii\web\NotFoundHttpException;

class AboutController extends \yii\web\Controller
{
    public function actionIndex($id = 0)
    {
		$abouts = About::findAbouts();
		
		//实现翻译时变化
		$key = array_keys($abouts);
		$value = array_values($abouts);
		
		//$k 业务 对应的数据库id
		//处理当传值错误时的情况
		if($id < count($abouts)){
			$k = $key[$id];
		}else{
			$id = 0;
			$k = $key[0];
		}
		
        return $this->render('index',[
			'id' => $id,
			'abouts' => $value,
			'model' => $this->findModel($k),
		]);
    }
	
	
	public function actionJoin()
    {
        return $this->render('index');
    }

	
	/**
     * Finds the About model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	protected function findModel($id)
    {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
