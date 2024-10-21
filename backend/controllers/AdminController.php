<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
/**
 * Site controller
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init()
    {   
    	$identity = isset(\Yii::$app->user->identity) ? \Yii::$app->user->identity : false;
        
    	$can_access = $identity ? ($identity->role== User::ROLE_USER ||$identity->role == User::ROLE_MANAGER || $identity->role == User::ROLE_ADMIN) : false;
        if(!$can_access){
        	$this->redirect("/site/login");
        }
    }
}
