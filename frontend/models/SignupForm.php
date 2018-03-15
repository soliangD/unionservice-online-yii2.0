<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
	public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名被占用'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮件地址已经存在'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致'],
        
		];
    }

	
	//修改属性对应的展示标签
	public function attributeLabels()
	{
		return [
		          'username' => Yii::t('app','用户名'),
				  'password' => Yii::t('app','密码'),
				  'password_repeat' => Yii::t('app','确认密码'),
		       ];
	}
	
	
	
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
