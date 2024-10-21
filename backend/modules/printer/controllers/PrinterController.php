<?php

namespace backend\modules\printer\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\printer\models\Printer;
use backend\modules\printer\models\PrinterSreach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
/**
 * PrinterController implements the CRUD actions for printer model.
 */
class PrinterController extends Controller
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

    /**
     * Lists all printer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrinterSreach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        var_dump($dataProvider->models);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single printer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
      
        ]);
    }

    /**
     * Creates a new printer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new printer();
         $model->day_delivery=date("d/m/Y");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing printer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
 public function actionList($q = null){
     
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'name' => '']];
    if (!is_null($q)){
    
 
     $data = (new \yii\db\Query())->select(["model as id","model as name"])->distinct()->from('printer')->orFilterWhere(['like', 'model',$q])->limit(20)->all();
 
//        $data->createCommand()->getRawSql()."<br>";
    
      $out['results'] =array_values(ArrayHelper::toArray($data)); 
    
    }
    return $out;
    }
    /**
     * Deletes an existing printer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
public function actions()
   {
    
 
        return ArrayHelper::merge(parent::actions(), [
           'edititems' => [                                       // identifier for your editable column action
               'class' => EditableColumnAction::className(),     // action class name
               'modelClass' => Printer::className(),                // the model for the record being edited
           
               'outputValue' => function ($model, $attribute, $key, $index) {
           
                   if($attribute=='itemid'){
                        $data = (new \yii\db\Query())->select(["name"])->from('item_information')->andFilterWhere(['id'=>$model->itemid])->one();
                       return $data['name'];
                        
                   } 
                   else{
                
                 return $model->$attribute ; 
                 
                   }     // return any custom output value if desired
               },
               'outputMessage' => function($model, $attribute, $key, $index) {
                                // any custom error to return after model save
               },
               'showModelErrors' => true,                        // show model validation errors after save
               'errorOptions' => ['header' => ''],                // error summary HTML options
//                'postOnly' => true,
//                'ajaxOnly' => true,
               // 'findModel' => function($id, $action) {},
               // 'checkAccess' => function($action, $model) {}
           ]
       ]);
   }
    /**
     * Finds the printer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return printer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = printer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
