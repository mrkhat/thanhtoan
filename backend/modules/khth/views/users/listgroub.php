<?php

use yii\helpers\Html;
 use yii\helpers\Url;
use backend\modules\users\models\UserTypes;
 use common\components\Utils;
/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\users */
 
//  var_dump($model);
$data =[];
$i=0;
// foreach ( $model as $value) {
////     var_dump($value );exit;
//     if($i==0 ){
//    $data[]=['nodeid'=>$value['PhongBan_Id'],'text'=>$value['TenPhongBan'],'tags'=>[0],'G'=>$value['CapTren_Id'],'nodes'=>[]];
//     $i++;}
//     elseif($value['PhongBan_Id']!=$data[$i-1]['G']){
//         
//    $data[]=['nodeid'=>$value['PhongBan_Id'],'text'=>$value['TenPhongBan'],'tags'=>[0],'G'=>$value['CapTren_Id'],'nodes'=>[]];
//    $i++; 
//    
//     }else{
////     var_dump($data[$i-1]['G']);
//         $data[$i-1]['tags'][0]++;
//   array_push($data[$i-1]['nodes'],['nodeid'=>$value['PhongBan_Id'],'text'=>$value['TenPhongBan'],'G'=>$value['CapTren_Id']]);
//    
// }
//  
//     }
//     echo json_encode($data);
?>

 

<?php
 
 foreach ( $model as $value) {
     if($i==0 ){
    $data[]=['id'=>$value['Group_id'],'text'=>$value['Group_Name'],'tags'=>[0],];
       }
          }
     echo json_encode($data);
?>

 