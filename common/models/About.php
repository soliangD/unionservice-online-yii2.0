<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $language
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
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
            'title' => '页面',
            'content' => '内容',
            'language' => '语言',
        ];
    }


	public static function findAbouts()
	{
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		$model = About::find()->select('id,title')->where(['language'=>$lng])->all();
		$abouts = array();
		//返回以id为键，title为值的数组
		foreach($model as $k=>$v) {
			$abouts[$v->id] = $v->title;
		}
		return  $abouts;
	}

    //返回语言 zh：中文  cn：英文
    public function getLan()
    {
        return $this->language == 'zh' ? '中文(CN)' : '英文(EN)';
    }

    /**
     * 首页展示公司简介
     */
    public static function findHomeAbout()
    {
        $lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
        $id = Yii::$app->language == 'zh-CN' ? '7' : '8';

        return  About::find()->where(['language'=>$lng, 'id'=>$id])
                            ->one();
    }



}
