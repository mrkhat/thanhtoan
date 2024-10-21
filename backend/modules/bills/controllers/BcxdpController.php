<?php

namespace backend\modules\bills\controllers;

use Yii;
 
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BcxdpController extends Controller
{
      public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   
                'only' => ['index', 'update', 'delete','create','view','print','edititems','print'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','update','create','view','edititems','print'],
                        'roles' => ['@'],
                    ],
                
           
                ],
        ]
        ];
        
    }
    public function actionIndex()
    {
        
          $dataProvider = new SqlDataProvider([
        'db' => Yii::$app->db,
        'sql' => 'CALL tonkho2;',
   
//        'sort' =>false,
//        'pagination' => [
//            'pageSize' => 10,
//        ],
    ]);

    return $this->render('index', [
        'dataProvider' => $dataProvider,
    ]);
        
    }

}
