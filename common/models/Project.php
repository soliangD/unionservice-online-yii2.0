<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $language
 * @property integer $start_time
 * @property integer $end_time
 */
class Project extends \yii\db\ActiveRecord
{
    public $startTime;
    public $endTime;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['start_time', 'end_time'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['language'], 'string', 'max' => 8],

            [['startTime', 'endTime'],'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '项目名',
            'content' => '展示内容',
            'language' => '语言',
            'start_time' => '开始时间',
            'end_time' => '结束时间',


            'startTime' => '开始时间',
            'endTime' => '结束时间',
        ];
    }

    //返回语言 zh：中文  cn：英文
    public function getLan()
    {
        return $this->language == 'zh' ? '中文(CN)' : '英文(EN)';
    }



    //首页展示最新新闻
    public static function findRecentProjects($limit = 8)
    {
        $lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
        return  Project::find()->where(['language'=>$lng])
            ->orderBy('id desc')
            ->limit($limit)
            ->all();
    }

    //截取标题
    public function getShortTitle()
    {
        $tmpStr = strip_tags($this->name);
        $tmpLen = mb_strlen($tmpStr);

        return mb_substr($tmpStr,0,18,'utf-8').(($tmpLen>18)?'...':'');

    }

    //获得分页数据
    public static function page($page,$size = 12)
    {
        $lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
        $start = ($page-1)*$size;


        return  Project::find()->where(['language'=>$lng])
            ->orderBy('id desc')
            ->limit($size)
            ->offset($start)
            ->all();
    }

    //获得分页按钮数组
    public static function pageNumber($page,$size = 12)
    {
        $lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
        $count = Project::find()->where(['language'=>$lng])->count();
        $pageCount = ceil($count/$size);

        $nums = array();

        if($pageCount == 1){
            $nums['size'] = 0;
            $nums['start'] = 0;
        }elseif($pageCount < 10){
            $nums['size'] = $pageCount;
            $nums['start'] = 1;
        }elseif($page <= 5){
            $nums['size'] = 9;
            $nums['start'] = 1;
        }elseif($page > $pageCount-4){
            $nums['size'] = 9;
            $nums['start'] = $pageCount-8;
        }else{
            $nums['size'] = 9;
            $nums['start'] = $page-4;
        }

        return $nums;
    }



    // 在进行save()之前默认进行的方法，可复写此方法控制程序走向
    // 在此次给开始时间和结束时间赋值
    //$insert参数是用来区别写入数据库时时写入还是修改
    //在方法中应先调用父类同方法（beforeSave()），确保原方法代码执行
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if(!empty($this->startTime)) {
                $this->start_time = strtotime($this->startTime);
            }
            if(!empty($this->endTime)) {
                $this->end_time = strtotime($this->endTime);
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    //表单时间$endTime 赋初值
    public function afterFind()
    {
        $this->startTime = empty($this->start_time) ? '未设置' : date('Y-m-d',$this->start_time);
        $this->endTime = empty($this->end_time) ? '未结束' : date('Y-m-d',$this->end_time);
    }

}
