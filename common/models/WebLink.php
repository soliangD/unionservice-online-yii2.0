<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_link".
 *
 * @property integer $id
 * @property string $web_name
 * @property string $web_link
 */
class WebLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['web_name', 'web_link'], 'required'],
            [['web_name'], 'string', 'max' => 64],
            [['web_link'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'web_name' => '网站名称',
            'web_link' => '网站链接',
        ];
    }
}
