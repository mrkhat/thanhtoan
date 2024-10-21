<?php

namespace backend\modules\dashboard\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */public function behaviors()
    {
        return ['access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
                'ruleConfig' => [
              'class' => \common\components\AccessRule::className(),
    ],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    { 
       if(isset(\Yii::$app->user->identity)){       
       return $this->render('index');
     
       }else{  return $this->redirect('/site');}    }
}
