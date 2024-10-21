<?php

namespace backend\modules\gatepass\controllers;

use Yii;
use backend\modules\gatepass\models\Gatepass;
use backend\modules\gatepass\models\SearchGatepass;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
//use common\components\Utils;

/**
 * GatepassController implements the CRUD actions for Gatepass model.
 */
class GatepassController extends Controller
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
            ],
        ];
    }

    /**
     * Lists all Gatepass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchGatepass();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gatepass model.
     * @param integer $id
     * @return mixed
     */
        public function actionPrint($id){
             $mpdf = new \mPDF('utf-8', 'A5-L');

// Write some HTML code:
$mpdf->defaultfooterline=0;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($this->renderAjax('print', [
            'model' => $this->findIModel($id),
        ]));
   

// Output a PDF file directly to the browser
$mpdf->Output();
//return $this->renderAjax('print', [
//            'model' => $this->findModel($id),
//        ]);
    }
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Gatepass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Gatepass();
//        $model->type=0;
//        $model->groupid=1;
//        $model->display_date=date("d/m/Y");
    
   
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->key]);
        } else {
          
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bgtbdien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
      
//        if($model->status&&\Yii::$app->user->identity->role==10){
//             return $this->redirect(['index']);
//        }
        // add conditions that should always apply here

          $dataProvider = new ActiveDataProvider([
            'query' =>  Gatepass::find(),
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
                    ]]
              ]);
        
         
        $dataProvider->query->andWhere(['key'=>$id]);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach(Gatepass::find()->where(['key'=>$id])->all() as $row){
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

    /**
     * Deletes an existing Gatepass model.
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
     * Finds the Gatepass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gatepass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gatepass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     protected function findIModel($id)
    {
        if (($model = Gatepass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
