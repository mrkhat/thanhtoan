<?php

namespace backend\modules\bills\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\bills\models\Nhaptb;
use backend\modules\bills\models\Bills;
use backend\modules\bills\models\SearchNhaptb;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use yii\data\ActiveDataProvider;
/**
 * NhaptbController implements the CRUD actions for Nhaptb model.
 */
class NhaptbController extends Controller
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
                   
                'only' => ['index', 'update', 'delete','create','view','print','edititems'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','update','view','create','edititems','print'],
                        'roles' => [20,30],
                    ],
           
                ],
        ]
        ];
        
    }
    /**
     * @inheritdoc
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all nhaptb models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchNhaptb();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nhaptb model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
     $model = $this->findModel($id);
      

        // add conditions that should always apply here

          $dataProvider = new ActiveDataProvider([
            'query' =>  nhaptb::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
        
         
        $dataProvider->query->andWhere(['key'=>$id]);
     
         
            return $this->renderAjax('view', [
                'dataProvider'=>$dataProvider,
                'model' => $model,
               
            ]);
    }

    /**
     * Creates a new Nhaptb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bills();
        $model->type=1;
        $model->groupid=1;
        $model->roomid=10;
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
     * Updates an existing Nhaptb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
      

        // add conditions that should always apply here

          $dataProvider = new ActiveDataProvider([
            'query' =>  Nhaptb::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
        
         
        $dataProvider->query->andWhere(['key'=>$id]);
     
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach(Nhaptb::find()->where(['key'=>$id])->all() as $row){
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
        public function actionPrint($id){
               $dataProvider = new ActiveDataProvider([
            'query' =>  Nhaptb::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
        
         
        $dataProvider->query->andWhere(['key'=>$id]);
   $mpdf = new \mPDF('utf-8', 'A5-L');
// Write some HTML code:
$mpdf->defaultfooterline=0;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($this->renderAjax('print', [
            'model' => $dataProvider ,
        ]));
   

// Output a PDF file directly to the browser
$mpdf->Output();
//return $this->renderAjax('print', [
//            'model' => $this->findModel($id),
//        ]);
    }
public function actions()
   {
        return ArrayHelper::merge(parent::actions(), [
           'edititems' => [                                       // identifier for your editable column action
               'class' => EditableColumnAction::className(),     // action class name
               'modelClass' => nhaptb::className(),                // the model for the record being edited
               'outputValue' => function ($model, $attribute, $key, $index) {
                   if($attribute=='itemid'){
                        $data = (new \yii\db\Query())->select(["name"])->from('item_information')->andFilterWhere(['id'=>$model->itemid])->one();
                       return $data['name'];
                        
                   }else{
                
                 return $model->$attribute ; }     // return any custom output value if desired
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
    /**
     * Deletes an existing Nhaptb model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   
        $model=$this->findBModel($id);
        $key=$model->key;
        $model->delete();

        return $this->redirect(['update', 'id' =>$key]);
    }

    /**
     * Finds the Nhaptb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nhaptb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nhaptb::findOne(['key'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     protected function findBModel($id)
    {
        if (($model = Bills::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
