<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Business;
use yii\web\NotFoundHttpException;


class BusinessController extends Controller
{
	
    public function actionIndex($id = 0)
    {
		//返回业务 id=>name 的数组
		$business = Business::findBusiness();
		
		//实现翻译时变化
		$key = array_keys($business);
		$value = array_values($business);
		
		//$k 业务 对应的数据库id
		//处理当传值错误时的情况
		if($id > 0 && $id < count($business)){
		    $id = ceil($id);         //处理较为强硬！
			$k = $key[$id];
		}else{
			$id = 0;
			$k = $key[0];
		}

        return $this->render('index', [
			'id' => $id,
			'business' => $value,
			'model' => $this->findModel($k),
		]);
    }

	
	 /**
     * Finds the Business model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Business the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Business::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
