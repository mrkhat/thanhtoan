<?php

namespace backend\modules\tscd\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\tscd\models\Tscd;
use backend\modules\tscd\models\TscdSreach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
/**
 * TscdController implements the CRUD actions for Tscd model.
 */
class TscdController extends Controller
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
                   
                'only' => ['index', 'update', 'delete','create','view','print'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index', 'update', 'create','view','print'],
                        'roles' => ['@'],
                    ],
                
           
                ],
        ]
    ];}

    /**
     * Lists all Tscd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TscdSreach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tscd model.
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
     * Creates a new Tscd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       $model = new Tscd();
       $model->display_date=date("d/m/Y");
      
       $model->load(Yii::$app->request->post());
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->key]);
        } else {
          
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        
        
    }

    /**
     * Updates an existing Tscd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['update', 'id' => $model->key]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    } 
    public function actionPrint($id){
$mpdf = new \mPDF('utf-8', 'A4-P');
  $dataProvider = new ActiveDataProvider([
            'query' => Tscd::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
$dataProvider->query->andWhere(['key'=>$id]);
 
// Write some HTML code:
$mpdf->defaultfooterline=0;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($this->renderAjax('print', [
                      'data'=>$dataProvider,
                      'model'=>$dataProvider->getModels()[0],
    

        ]));
 

// Output a PDF file directly to the browser
 
$mpdf->Output();
 
    }
    /**
     * Deletes an existing Tscd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    
    
    
      public function actionUpdate($id)
    {
        $model = $this->findModel($id);
      
        if(\Yii::$app->user->identity->role==10){
             return $this->redirect(['index']);
        }
        // add conditions that should always apply here

          $dataProvider = new ActiveDataProvider([
            'query' =>  Tscd::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
        
         
        $dataProvider->query->andWhere(['key'=>$id]);
     
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach(Tscd::find()->where(['key'=>$id])->all() as $row){
              $row->load(Yii::$app->request->post()) ;
              $row->save()  ;
            }
           
            return $this->redirect(['update', 'id' => $model->key]);
        } else {
            return $this->render('update', [
                'dataProvider'=>$dataProvider,
                'model' => $model,
               
            ]);
        }
    }
    
    
    
    
    public function actions()
   {
        return ArrayHelper::merge(parent::actions(), [
           'edititems' => [                                       // identifier for your editable column action
               'class' => EditableColumnAction::className(),     // action class name
               'modelClass' => Tscd::className(),                // the model for the record being edited
           
               'outputValue' => function ($model, $attribute, $key, $index) {
//                   if($attribute=='itemid'){
//                        $data = (new \yii\db\Query())->select(["name"])->from('Tscd')->andFilterWhere(['id'=>$model->itemid])->one();
//                       return $data['name'];
//                        
//                   } 
//                   else{
                
                 return $model->$attribute ; 
                 
//               }     // return any custom output value if desired
               },
               'outputMessage' => function($model, $attribute, $key, $index) {
                                // any custom error to return after model save
               },
               'showModelErrors' => true,                        // show model validation errors after save
               'errorOptions' => ['header' => ''],                // error summary HTML options
//                'postOnly' => true,
                'ajaxOnly' => true,
               // 'findModel' => function($id, $action) {},
               // 'checkAccess' => function($action, $model) {}
           ]
       ]);
   }
    public function actionDelete($id)
    {
           $model=$this->findBModel($id);
        $key=$model->key;
        $model->delete();

        return $this->redirect(['update', 'id' =>$key]);
    }

    /**
     * Finds the Tscd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tscd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
     protected function findModel($id)
    {
        if (($model = Tscd::findOne(['key'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
       protected function findBModel($id)
    {
        if (($model = Tscd::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}