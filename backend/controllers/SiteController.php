<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\User;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                         //'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        //'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    { 
        return $this->render('index');
    }

    public function actionLogin()
    {    	
    	$identity = isset(\Yii::$app->user->identity) ? \Yii::$app->user->identity : false;
            
    	$can_access = $identity ? ($identity->role== User::ROLE_USER ||$identity->role == User::ROLE_MANAGER || $identity->role == User::ROLE_ADMIN) : false;
        if ($can_access) {   
            
        	return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {         	
            $this->redirect(\Yii::$app->urlManager->createUrl("dashboard"));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }                
        
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
