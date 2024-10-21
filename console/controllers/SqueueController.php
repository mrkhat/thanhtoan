<?php
namespace console\controllers;
//use common\components\AccessRule;
//use yii\filters\AccessControl;
//use backend\modules\task\models\Task;
//use backend\modules\task\models\TaskSreach;
//use backend\modules\task\models\TasksInformation;
use backend\modules\task\controllers\SendmailsqueueController;

//use backend\modules\task\models\TasksInformationSearch;
//use backend\modules\vanban\models\Vanban;
//use backend\modules\task\models\TaskSreach;
//use yii\console\Controller;
use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use yii\data\ActiveDataProvider;

/**
 * TaskController implements the CRUD actions for Task model.
 */
use common\components\Emailsqueue;
class SqueueController extends  \yii\console\Controller

{
     
 public function actionCalldieline() {
    
  
        Emailsqueue::Sendmailsqueuedielinecall();
        
    }
   
    
    
     public function actionSendmailsqueuedielinecall() {
 
       
         
         
            }
//            var_dump(true);
//            return $this->redirect('index');
        

         
  
    
}
