<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $img_url
 * @property string $img_text
 * @property string $img_link
 */
class Banner extends \yii\db\ActiveRecord
{
    public $bannerFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img_url'], 'required'],
            [['img_url', 'img_text', 'img_link'], 'string', 'max' => 128],
        ];
    }

    //返回轮播图信息
    public static function findBanner()
    {
        return Banner::find()->all();
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_url' => '图片路径',
            'img_text' => '提示语',
            'img_link' => '图片链接',
            'bannerFile' => '上传图片',
        ];
    }
}
