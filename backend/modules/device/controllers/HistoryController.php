<?php

namespace backend\modules\device\controllers;

use Yii;
use backend\modules\device\models\DeviceLocation;
use backend\modules\device\models\SearchHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\filters\VerbFilter;

/**
 * HistoryController implements the CRUD actions for DeviceLocation model.
 */
class HistoryController extends Controller
{
    /**
     * @inheritdoc
     */
public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
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
                        'roles' => [20],
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

    /**
     * Lists all DeviceLocation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchHistory();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DeviceLocation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DeviceLocation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DeviceLocation();
        $post=Yii::$app->request->post();
         $device_id=Yii::$app->request->post('DeviceLocation')['device_id'];
     
        if(!is_null($device_id)){
     foreach ($device_id as $row){
     $post['DeviceLocation']['device_id']=$row;
   
 
   $model = new DeviceLocation();      
     if($model->load($post)&&$model->save()){
     
  
         
     }  else {
         
       return $this->render('create', [
                'model' => $model,
            ]);
}
 
        
  }
   
   return $this->redirect('index');
       }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DeviceLocation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
$model = $this->findModel($id);
 
 
 

           if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DeviceLocation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DeviceLocation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DeviceLocation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DeviceLocation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
