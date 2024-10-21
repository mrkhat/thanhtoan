<?php

namespace backend\modules\recive\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\recive\models\Recive;
use backend\modules\recive\models\ReciveInformation;
use backend\modules\recive\models\SearchRecive;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReciveController implements the CRUD actions for recive model.
 */
class ReciveController extends Controller
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
                   
                  'only' => ['index', 'update', 'delete','create','view'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => [20,30],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','update','create','view'],
                        'roles' => ['@'],
                    ],
                  
                ],]
        ];
    }

    /**
     * Lists all recive models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchRecive();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single recive model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
             return $this->renderAjax('view',['model'=> $this->findIModel($id)]);
    }

    /**
     * Creates a new recive model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recive();

      
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $file = UploadedFile::getInstance($model, 'attach');
             if(!is_null($file)){
             $orgName		= time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'phieuthu'.'/';
    	$filename 			= 'phieuthu'.$orgName.'.'.$file->extension;
             $saveStatus		= $file->saveAs($imageDir.$filename);
             if($saveStatus){
    $model->attach=$filename;
    
}
             }
              
             $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing recive model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */ public function actionUpdate($id)
    {
         
        $model = $this->findModel($id);
$attach=$model->attach;
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $file = UploadedFile::getInstance($model, 'attach');
             if(!is_null($file)){
             $orgName		= time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'phieuthu'.'/';
    	$filename 			= 'phieuthu'.$orgName.'.'.$file->extension;
             $saveStatus		= $file->saveAs($imageDir.$filename);
             if($saveStatus){
    $model->attach=$filename;
    @unlink(Yii::$app->params['assets-path'].'images/'.'phieuthu'.'/'.$attach);
}
             }
              
             $model->save();
           return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing recive model.
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
     * Finds the recive model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return recive the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recive::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
       protected function findIModel($id)
    {
        if (($model = ReciveInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}