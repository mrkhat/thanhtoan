<?php
/**
 * User: TamNguyen
 * Date: 8/17/16
 * Time: 11:34
 * File name: Baners.php
 * Project name: Singmark Hospital 
 */
namespace common\components;

//use backend\modules\menus\models\MenusInformation;
//use backend\modules\languages\models\Languages;
use backend\modules\task\models\TasksInformation;
use backend\modules\vanban\models\Vanban;
/**
 * 
 * @author TamNguyen
 *
 */
class Emailsqueue {
    
     
    
   public static function Sendmailsqueue($id,$status=1) {
//        $id = $this->request->post('id');
//        $status = $this->request->post('status');
       $dir =  'd:\web\vanban/' . \Yii::$app->params['assets-path'] . \Yii::$app->params['uploadFilevb'];
         
       $model = TasksInformation::find()->select(['email','email2'])->where(['id_vanban' => $id])->andFilterWhere(['in','status',[2,3] ])->asArray()->all();
        
        if (count($model) > 0) {
            $email;
            foreach ($model as $value) {
                if ($value['email'] != "") {
                    $email[] = $value['email'];
                    $email[] = $value['email2'];
                }
                
            }
         
            $email = array_unique($email); 
           
            $vb = Vanban::findOne(['id' => $id]);
            
//             if($id==15)var_dump($vb);
            $attach = json_decode($vb->attach);
         
          
           
            
          
            $files = [];
//           echo'yyyyyy'.$id;   exit;
            if (count($email)) {
                $subject = $status == 0 ? "Thông báo Có Công Việc mới :".$vb->name : "Có Công Việc đến hạn cần sử lý: ".$vb->name;
                $mail = \Yii::$app->mailer->compose('layouts\vanban', ['model' => $vb]) // Sử dụng nếu có template
                        ->setFrom(['admin@app.com' => 'Bệnh Viện Đa Khoa Đồng Nai Quản Lý Công Việc']) // Mail sẽ gửi đi
                        ->setTo($email) // Mail sẽ nhận
                        ->setSubject($subject);
                if (!is_null($attach) && count($attach) || $status == 0) {
                 
                    foreach ($attach as $value) {
                      
                   
                       
                        if (file_exists($dir . $value)) {
                          
                            $mail->attach($dir . $value,['fileName'=>$value]);
//                             
                        }
                    }
                }
           
                   $mail->delay('PT3M')
                   ->unique(uniqid(time())) // a unique key for the mail message, new message with the same key will replace the old one
                        ->queue();
            }

          
        }

//        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
    
    
     public static function Sendmailsqueuedielinecall() {
 
        $model = TasksInformation::find()->select('id_vanban')->distinct()->andFilterWhere(['in','status',[2,3] ])->asArray()->all();
 
        if (count($model) > 0) {
            foreach ($model as $value) {
//                var_dump($value);
                 
                Emailsqueue::Sendmailsqueue($value['id_vanban']);
            }
 }
     
    }
 
}
