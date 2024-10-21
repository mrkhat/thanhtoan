<?php

namespace backend\modules\project\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\project\models\Project;
use backend\modules\project\models\SearchProject;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\project\models\ProjectInfomation;
use common\components\Utils;
use yii\helpers\Json;
use yii\helpers\FileHelper;
/**
 * ProjectController implements the CRUD actions for project model.
 */
class ProjectController extends Controller
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
                        'actions' => ['delete','create','update',],
                        'roles' => [20,30],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['@'],
                    ],
                  
                ],]
        ];
    }

    /**
     * Lists all project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProject();
 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
           return $this->renderAjax('view',['model'=> $this->findIModel($id)]);
    }

    /**
     * Creates a new project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $file = UploadedFile::getInstance($model, 'attach');
             if(!is_null($file)){
             $orgName		= time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'hopdong'.'/';
    	$filename 			= 'hopdong'.$orgName.'.'.$file->extension;
             $saveStatus		= $file->saveAs($imageDir.$filename);
             if($saveStatus){
    $model->attach=Json::encode(array($filename));
       
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
     * Updates an existing project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $attach=$model->attach;
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           $model->attach=$attach;
//             $file = UploadedFile::getInstance($model, 'attach');
//             if(!is_null($file)){
//             $orgName		= time();
//    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'hopdong'.'/';
//    	$filename 			= 'hopdong'.$orgName.'.'.$file->extension;
//             $saveStatus		= $file->saveAs($imageDir.$filename);
//             if($saveStatus){
//    $model->attach=$filename;
//    @unlink(Yii::$app->params['assets-path'].'images/'.'hopdong'.'/'.$attach);
//}
//             }
              
             $model->save();
           return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
  public function actionImageUpload($id)
{
            $model = $this->findModel($id);

    $imageFile = UploadedFile::getInstance($model, 'attach');

    $directory = \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'hopdong'.'/';
    if (!is_dir($directory)) {
        FileHelper::createDirectory($directory);
    }

    if ($imageFile) {
        $uid = uniqid(time());
        $fileName = $uid . '.' . $imageFile->extension;
        $filePath = $directory . $fileName;
        if ($imageFile->saveAs($filePath)) {
             $attach= Json::decode($model->attach);
             $attach[]=$fileName;
             $model->attach=Json::encode($attach);
             $model->save();
            $path = Utils::loadImage('hopdong/'.$fileName);
            return Json::encode([
                'files' => [
                    [
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        'url' => $path,
//                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'imagedelete?name=' . $fileName."&id=".$id,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
    }

    return '';
}
public function actionImagedelete($name,$id)
{
      $model = $this->findModel($id);
             $attach= Json::decode($model->attach);
             $attach=array_diff($attach, [$name]);
            
             $model->attach=Json::encode($attach);
             $model->save();
  $directory = \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'hopdong'.'/';
    if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
        
        unlink($directory . DIRECTORY_SEPARATOR . $name);
        
        
    }

    $files = FileHelper::findFiles($directory);
    $output = [];
    foreach ($files as $file) {
        $fileName = basename($file);
        $path = Utils::loadImage('hopdong/'.$fileName);
        $output['files'][] = [
            'name' => $fileName,
            'size' => filesize($file),
            'url' => $path,
//            'thumbnailUrl' => $path,
            'deleteUrl' => 'image-delete?name=' . $fileName,
            'deleteType' => 'POST',
        ];
    }
    return Json::encode($output);
}
    /**
     * Finds the project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
      protected function findIModel($id)
    {
        if (($model = ProjectInfomation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
