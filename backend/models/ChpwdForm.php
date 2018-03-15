<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Adminuser;

/**
 * Chpwd form
 */
class ChpwdForm extends Model
{
	public $password_old;
    public $password;
	public $password_repeat;
	
	private $_user;
	
	
	public function __construct($config = [])
    {
		$id = Yii::$app->user->identity->id;
        $this->_user = Adminuser::findIdentity($id);
		
        parent::__construct($config);
    }
	

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			['password_old', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['password_repeat','compare','compareAttribute'=>'password','message'=>Yii::t('app','两次输入的密码不一致')],
			['password_old', 'validatePassword'],       //password 通过validatePassword()方法验证
		];
    }

	
	//修改属性对应的展示标签
	public function attributeLabels()
	{
		return [
		          'password_old' => Yii::t('app','原密码'),
				  'password' => Yii::t('app','密码'),
				  'password_repeat' => Yii::t('app','确认密码'),
		       ];
	}
	
	
	
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->_user;

            if (!$user || !$user->validatePassword($this->password_old)) {
                $this->addError($attribute, Yii::t('app','原密码错误'));
            }
			
			
        }
    }

	
	//修改密码
	public function changePassword()
	{
		if ($this->validate()) {     //进行验证，rules
            $user = $this->_user;

			$user->setPassword($this->password);

			return $user->save(false);
			
        } else {
            return false;
        }
	}


}
