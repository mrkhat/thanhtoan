<?php

namespace backend\modules\device\controllers;

use Yii;
use backend\modules\device\models\Device;
use backend\modules\device\models\DeviceHistory;
use backend\modules\device\models\DeviceInformation;
use backend\modules\device\models\SearchDevice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use yii\data\ActiveDataProvider;

/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   
                'only' => ['index', 'update', 'delete','create','view','print','editdevice','print','barcode'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete','editdevice','create','update'],
                        'roles' => [30,20],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','view','print','barcode','updateld'],
                        'roles' => ['@'],
                    ],
                
           
                ],
        ]
        ];
        
    }
 public function actionUpdateld()
    {
      $data=Yii::$app->db->createCommand('CALL device_local_temp_update')->query();


       return $this->redirect('index');
    }
    /**
     * Lists all Device models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDevice();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
       public function actionBarcode()
    {
//        $searchModel = new SearchDevice();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('barcode', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPrintbarcode($barcode){

   $mpdf =  new \mPDF(
    'utf-8',
    [101.6,33]
    
);
// Write some HTML code:
$mpdf->defaultfooterline=0;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($this->renderAjax('printbarcode', [
            'model' => $barcode ,
        ]));
   

// Output a PDF file directly to the browser
$mpdf->Output();
//return $this->renderAjax('print', [
//            'model' => $this->findModel($id),
//        ]);
    }

    /**
     * Displays a single Device model.
     * @param integer $id
     * @return mixed
     */
    public function actionList($q = null, $id = null){
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'name' => '']];
    if (!is_null($q)) {
  $data = (new \yii\db\Query())->select(['id',"name",'departments','lever','user'])->from('device_information')->orFilterWhere(['like', 'name',$q])->limit(20)->all();
       
        $out['results'] =array_values(ArrayHelper::toArray($data));
    }
    elseif ($id > 0) {
 
    
        $out['results'] = (['name' => $id, 'name' => DeviceInformation::find($id)->one()->name]);
    }
    return $out;
    }
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionHistory($name)
    {
        
         $query = DeviceHistory::find()->orderBy(['date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>false
        ]);

//        $this->load($params);

       
         $query->andFilterWhere(['like',
            
            'name' ,$name
         
        ]);
        return $this->renderAjax('history', [
            'dataProvider' => $dataProvider,
//             'model' => $this->findIModel($id),
        ]);
    }

    /**
     * Creates a new Device model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Device();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
            }

 

 


    }
 public function actionCoppy($id){
 
    $project = $this->findModel($id);
     $model = new Device();
     $model->attributes =$project->attributes ;
unset($model['id']);  // $model->ProjId = null; does not work, must use unset instead!
$model->key = Device::find()->where(['type'=>$model->type])->max('`key`') + 1;
//$model->StatusId = 4;
$model->date = date('Y-m-d H:i:s');
$model->save(false);
  return $this->redirect('index');
 }
    /**
     * Updates an existing Device model.
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

    
      public function actions()
   {
       return ArrayHelper::merge(parent::actions(), [
           'editdevice' => [                                       // identifier for your editable column action
               'class' => EditableColumnAction::className(),     // action class name
               'modelClass' => Device::className(),                // the model for the record being edited
               'outputValue' => function ($model, $attribute, $key, $index) {
                     return  $model->$attribute ;      // return any custom output value if desired
               },
               'outputMessage' => function($model, $attribute, $key, $index) {
                     return  '';                                  // any custom error to return after model save
               },
               'showModelErrors' => true,                        // show model validation errors after save
               'errorOptions' => ['header' => ''],                // error summary HTML options
               // 'postOnly' => true,
                'ajaxOnly' => true,
                'formName'=>'DeviceInformation',
//                'findModel' => function($id, $action) {},
               // 'checkAccess' => function($action, $model) {}
           ]
       ]);
   }
    
    
    
    
    
    
    
    /**
     * Deletes an existing Device model.
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
     * Finds the Device model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Device the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Device::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
       protected function findIModel($id)
    {
        if (($model = DeviceInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
   
}
