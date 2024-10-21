<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_date
 * @property integer $modified_date
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    const ROLE_USER = 10;
    const ROLE_MANAGER = 20;
    const ROLE_ADMIN = 30;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
	public function behaviors()
    {
    	return [
    			[
    					'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'created_date',
    					'updatedAtAttribute' => 'modified_date',
    					'value' => new \yii\db\Expression('NOW()'),
    			]
    	];
    }

    /**
     * @inheritdoc
     */   
    public function rules()
    {
    	return [
//     			[['first_name', 'last_name', 'email', 'password', 'user_type', 'status', 'active_key', 'password_reset_token', 'login_date', 'created_date', 'modified_date'], 'required'],
//     			[['user_type', 'status'], 'integer'],
//     			[['login_date', 'created_date', 'modified_date'], 'safe'],
//     			[['first_name', 'last_name', 'email', 'password'], 'string', 'max' => 200],
//     			[['active_key', 'password_reset_token'], 'string', 'max' => 50],
    			['role', 'default', 'value' => 10],
    			['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_MANAGER, self::ROLE_ADMIN]],
    			['status', 'default', 'value' => self::STATUS_ACTIVE],
    			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
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
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
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
     * @return boolean
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
     * @return boolean if password provided is valid for current user
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
    
    public static function isUserNormal($email)
    {
    	if (static::findOne(['email' => $email, 'role' => self::ROLE_USER])){
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public static function isUserManager($email)
    {    	
    	if (static::findOne(['email' => $email, 'role' => self::ROLE_USER]) ||static::findOne(['email' => $email, 'role' => self::ROLE_ADMIN]) || static::findOne(['email' => $email, 'role' => self::ROLE_MANAGER])){
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public static function isUserAdmin($email)
    {
    	if (static::findOne(['email' => $email, 'role' => self::ROLE_ADMIN])){    
    		return true;
    	} else {   
    		return false;
    	}    
    }
    
    /**
     * Generates active key for new user
     */
    public function generateActiveKey()
    {
    	$this->active_key = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes active key
     */
    public function removeActiveKey()
    {
    	$this->active_key = null;
    }
    
   	public function activeUser(){
   		$this->status = User::STATUS_ACTIVE;
   		$this->removeActiveKey();
   		$this->save(false);
   	}
    
    public static function findByActiveKey($key)
    {
    	if (empty($key)) {
    		return false;
    	}
    
    	return static::findOne([
    			'active_key' => $key,
    			'status' => self::STATUS_INACTIVE,
    	]);
    }
    
}
