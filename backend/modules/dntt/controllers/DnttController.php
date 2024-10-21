<?php

namespace backend\modules\dntt\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\dntt\models\Dntt;
use backend\modules\dntt\models\DnttInformation;
use backend\modules\dntt\models\SearchDntt;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
 
use yii\filters\VerbFilter;
use common\components\Utils;
use yii\helpers\Json;
use yii\helpers\FileHelper;

/**
 * DnttController implements the CRUD actions for dntt model.
 */
class DnttController extends Controller
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
                        'roles' => [30],
                    ],
                
           
                ],
        ]
        ];
        
    }

    /**
     * Lists all dntt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDntt();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single dntt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findIModel($id);
if(\Yii::$app->user->identity->role==30||\Yii::$app->user->identity->id!==$model->created_by){

   
        return $this->renderAjax('view', [
            'model' => $this->findIModel($id),
        ]); }
else{
 throw new NotFoundHttpException('The requested page does not exist.');

}  
    }
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

    /**
     * Creates a new dntt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new dntt();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $file = UploadedFile::getInstance($model, 'attach');
             if(!is_null($file)){
            $orgName		= str_replace('/','-',$model->proposal).time();
    	$imageDir 		= \Yii::getAlias('@webroot').'/'.Yii::$app->params['assets-path'].'images/'.'dntt'.'/';
    	$filename 			= 'dntt'.$orgName.'.'.$file->extension;
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
     * Updates an existing dntt model.
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
     * Deletes an existing dntt model.
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
     * Finds the dntt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return dntt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
$model = Dntt::findOne($id);
 


        if ($model !== null&&(\Yii::$app->user->identity->role==30||$model->created_by==\Yii::$app->user->identity->id )) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findIModel($id)
    {
        if (($model = DnttInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
