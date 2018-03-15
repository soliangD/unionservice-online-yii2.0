<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $language
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content', 'language'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['language'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '业务名',
            'content' => '展示内容',
            'language' => '语言',
        ];
    }
	
	// 返回所有业务
	// 返回数组
	public static function findBusiness()
	{
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		$model = Business::find()->select('id,name')->where(['language'=>$lng])->all();
		$business = array();
		//返回以id为键，name为值的数组
		foreach($model as $k=>$v) {
			$business[$v->id] = $v->name;
		}
		return  $business;
	}
	
	//返回语言 zh：中文  cn：英文
    public function getLan()
    {
        return $this->language == 'zh' ? '中文(CN)' : '英文(EN)';
    }



	
}
