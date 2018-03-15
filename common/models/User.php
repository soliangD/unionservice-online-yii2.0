<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password

 * @property string $name
 * @property string $telphone
 * @property string $sex
 * @property integer $birth_time
 * @property string $specialty
 * @property string $city
 * @property string $address
 * @property string $work_experience
 * @property string $resume_link
 */

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	public $birth;
    public $age;
    public $password;
    public $resumeFile;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
			[['username', 'auth_key', 'password_hash', 'email'], 'required'],         //, 'created_at', 'updated_at'不需要加入‘必须’，由TimestampBehavior::className(),统一创建
            [['status', 'created_at', 'updated_at', 'birth_time'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email','birth'], 'string', 'max' => 255],
            [['auth_key', 'name'], 'string', 'max' => 32],
            [['telphone'], 'string', 'max' => 20],
            [['sex'], 'string', 'max' => 2],
            [['specialty', 'address'], 'string', 'max' => 128],
            [['city'], 'string', 'max' => 8],
            [['work_experience'], 'string', 'max' => 256],
            [['username'], 'unique'],
            [['email'], 'unique'],
			['email', 'email'],
            [['password_reset_token'], 'unique'],


            ['password', 'string'],
            ['password', 'string', 'min' => 6],

            ['resumeFile','file'],
        ];
    }


	public function attributeLabels()
    {
       return [
           'id' => 'ID',
           'username' => Yii::t('app','用户名'),
           'auth_key' => 'Auth Key',
           'password_hash' => 'Password Hash',
           'password_reset_token' => 'Password Reset Token',
           'email' => 'Email',
           'status' => Yii::t('app','状态'),
           'created_at' => '创建时间',
           'updated_at' => '修改时间',

		   'name' => Yii::t('app','姓名'),
           'telphone' => Yii::t('app','电话'),
           'sex' => Yii::t('app','性别'),
		   'birth' => Yii::t('app','出生日期'),
           'birth_time' => Yii::t('app','出生日期'),
           'specialty' => Yii::t('app','专业'),
           'city' => Yii::t('app','所在城市'),
           'address' => Yii::t('app','住址'),
           'work_experience' => Yii::t('app','工作经验'),
           'resume_link' => Yii::t('app','上传简历'),

           'age' => '年龄',    //利用birth_time 生成年龄 ，用于展示
           'password' => '密码',
       ];
   }




    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }




	// 在进行save()之前默认进行的方法，可复写此方法控制程序走向
	// 在此次给创建时间和修改时间赋值
	//$insert参数是用来区别写入数据库时时写入还是修改
	//在方法中应先调用父类同方法（beforeSave()），确保原方法代码执行
	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
		{
			if(!empty($this->birth)) {
				$this->birth_time = strtotime($this->birth);
			}
			return true;
		}
		else
		{
			return false;
		}
	}


	//表单时间$birth 赋初值   表单年龄$age  赋初值
	public function afterFind()
	{
		if(isset($this->birth_time))
		{
			$this->birth = date('Y-m-d',$this->birth_time);
            $this->age = ceil(((time() - $this->birth_time)/(365*3600*24)));
		}
	}


    //给下拉菜单提供状态数组
    public static function allStatus()
    {
        return [
            self::STATUS_ACTIVE=>'正常',    //相当于 0=>'正常'
            self::STATUS_DELETED=>'禁用'
        ];
    }
    //给_form试图的状态下拉菜单提供性别数组
    public static function allSex()
    {
        return [
            1=>'男',    //相当于 0=>'正常'
            2=>'女'
        ];
    }

    //给index页面展状态示用
    public function getStatusStr()
    {
        return ($this->status == self::STATUS_ACTIVE)?'正常':'禁用';
    }

    //创建用户时给密码赋值
    public function create()
    {
        $this->setPassword($this->password);
        $this->generateAuthKey();
    }

}
