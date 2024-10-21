<?php

namespace backend\modules\users\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\users\models\UsersSearch;
use backend\modules\users\models\Users;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * UsersController implements the CRUD actions for users model.
 */
class UsersController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   
                'only' => ['index', 'update', 'delete','create','view'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','create'],
                        'roles' => [30],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update','view'],
                        'roles' => ['@'],
                    ],
                  
                ],
        ]]
            
    ;}

    /**
     * Lists all users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view',['model'=> $this->findModel($id)]);
    }

    /**
     * Creates a new users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        $post 			= Yii::$app->request->post();
        if(!empty($post)){
     $model->load($post);
     $model->password_hash= Yii::$app->security->generatePasswordHash($model->password_hash);
//     $model->user_type  =  \backend\modules\users\models\UserTypes::findOne(['id'=>$model->role])->type   ;
     $model->user_type =$model->role;
       $file = UploadedFile::getInstance($model, 'attach');
             if(!is_null($file)){
             $orgName		= time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'avata'.'/';
    	$filename 			= 'avata'.$orgName.'.'.$file->extension;
             $saveStatus		= $file->saveAs($imageDir.$filename);
             if($saveStatus){
    $model->attach=$filename;
}
             }
     
     $model->save() ;
          
            return $this->redirect(['index']);
        } else {  
            $model->role=10;
             $model->status=1;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $role=\Yii::$app->user->identity->role;
        $userID=\Yii::$app->user->identity->id;
      if($role>$model->role||$userID==$model->id){
         
        $pass=$model->password_hash;
        $attach=$model->attach;
        $post 			= Yii::$app->request->post();
           if(!empty($post)){
            
                $model->load($post);
                $model->password_hash= (!$post['Users']['password_new']=='')?Yii::$app->security->generatePasswordHash($post['Users']['password_new']):$pass;
                $model->user_type =$model->role;
                    $file = UploadedFile::getInstance($model, 'attach');
             
           if(!is_null($file)){
         
             $orgName		= time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'avata'.'/';
    	$filename 			= 'avata'.$orgName.'.'.$file->extension;
             $saveStatus		= $file->saveAs($imageDir.$filename);
            
             if($saveStatus){
                
    $model->attach=$filename;
    @unlink(Yii::$app->params['assets-path'].'images/'.'avata'.'/'.$attach);
}
 
               
             } else{
               $model->attach=$attach;   
             }
              
                $model->save() ;
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
      }
      
        }else{  return $this->redirect(['index']);}
    }

    /**
     * Deletes an existing users model.
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
     * Finds the users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
