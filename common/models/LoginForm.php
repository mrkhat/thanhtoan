<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = false;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
//        	['email', 'email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {    	
        if ($this->validate()) {
        	$user = $this->getUser();
        	$user->login_date = date('Y-m-d H:i:s');
        	$user->save();
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 : 0);
        } else {
            return false;
        }
    }
    
    public function loginAdmin()
    {
    	if ($this->validate() && User::isUserManager($this->email)) {  
    		$user = $this->getUser();
    		$user->login_date = date('Y-m-d H:i:s');
    		$user->save();
    		return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600: 0);
    	} else {
    		return false;
    	}
    }
    

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
