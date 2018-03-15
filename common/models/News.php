<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $language
 * @property string $author
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 */
class News extends ActiveRecord
{
    /**
     * 记录状态
     * @var array
     */
    public static $STATUS = array(
        "UNKNOWN" => array(
            'val' => 0,
            'des' => '未知',
        ),
        "CREATED" => array(
            'val' => 10,
            'des' => '未发布',
        ),
        "AUDITING" => array(
            'val' => 20,
            'des' => '已发布',
        ),
        "PASSED" => array(
            'val' => 30,
            'des' => '已删除',
        ),
    );

	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    //自动更新创建时间和修改时间
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],  //默认是使用 created_at  update_at
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author'], 'required'],  //, 'created_at', 'updated_at'不需要加入‘必须’，由TimestampBehavior::className(),统一创建与更新
            [['content'], 'string'],
            [['create_time', 'update_time', 'status'], 'integer'],
            [['title', 'author'], 'string', 'max' => 128],
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
            'title' => '标题',
            'content' => '内容',
            'language' => '语言',
            'author' => '作者',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'status' => '状态',
            'shortTitle' => '标题',
        ];
    }
	
	
	//首页展示最新新闻
	public static function findRecentNews($limit = 8)
	{
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		return  News::find()->where(['status'=>1,'language'=>$lng])
							->orderBy('create_time desc,id desc')
							->limit($limit)
							->all();
	}



	//截取标题
	public function getShortTitle()
	{
		$tmpStr = strip_tags($this->title);
		$tmpLen = mb_strlen($tmpStr);

		return mb_substr($tmpStr,0,35,'utf-8').(($tmpLen>35)?'....':'');

	}

    //返回语言 zh：中文  cn：英文
    public function getLan()
    {
        return $this->language == 'zh' ? '中文(CN)' : '英文(EN)';
    }


    //给index页面展状态示用
    public function getStatusStr()
    {
        return ($this->status == '1') ? '已发布' : '未发布';
    }

	
	
	//获得分页数据
	public static function newsPage($page,$size = 12)
	{
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		$start = ($page-1)*$size;
		
		
		return  News::find()->where(['status'=>1,'language'=>$lng])
							->orderBy('create_time desc,id desc')
							->limit($size)
							->offset($start)
							->all();
	}
	
	//获得分页按钮数组
	public static function pageNumber($page,$size = 12)
	{
		$lng = Yii::$app->language == 'zh-CN' ? 'zh' : 'en';
		$count = News::find()->where(['status'=>1,'language'=>$lng])->count();
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
	
	
	
	
	
}
