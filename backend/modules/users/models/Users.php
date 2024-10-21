<?php

namespace backend\modules\users\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password_hash
 * @property integer $role
 * @property integer $user_type
 * @property integer $status
 * @property string $auth_key
 * @property string $active_key
 * @property string $password_reset_token
 * @property string $login_date
 * @property string $created_date
 * @property string $modified_date
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $password_repeat;
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password_hash', 'role',  'status'], 'required'],
            [['role', 'user_type', 'status', 'auth_key','user_type'], 'integer'],
            [['email'], 'string'],
            [['login_date', 'created_date', 'attach', 'active_key', 'password_reset_token', 'login_date', 'created_date', 'modified_date'], 'safe'],
            [['first_name', 'last_name', 'email', 'password_hash', 'auth_key'], 'string', 'max' => 200],
            [['active_key', 'password_reset_token'], 'string', 'max' => 50],
            ['password_repeat', 'required', 'on' => 'create'],
             ['password_repeat', 'compare', 'compareAttribute'=>'password_hash', 'on' => 'create', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
            ['password_repeat', 'required', 'on' => 'update'],
             ['password_repeat', 'compare', 'compareAttribute'=>'password_new', 'on' => 'update', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
      
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'role' => Yii::t('app', 'Role'),
            'user_type' => Yii::t('app', 'User Type'),
            'status' => Yii::t('app', 'Kích hoạt'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'active_key' => Yii::t('app', 'Active Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'login_date' => Yii::t('app', 'Login Date'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
        
        ];
    }

    /**
     * @inheritdoc
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    } public function behaviors()
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
     public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
      public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
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
    	if (static::findOne(['email' => $email, 'role' => self::ROLE_ADMIN]) || static::findOne(['email' => $email, 'role' => self::ROLE_MANAGER])){
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
}
