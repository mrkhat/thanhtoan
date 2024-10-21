<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\modules\users\models\Users;
 use common\components\Utils;
/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */

  
?>
<div class="partner-view">

             <?php 
             $url='data/images/mau_van_ban';
           $files=( \yii\helpers\FileHelper::findFiles($url,['only'=>['*.pdf','*.doc','*.docx']]));
          asort($files);
          $i=0;
           foreach ($files as $key=>$file){
               $i++;
           $nameFicheiro = substr($file, strrpos($file, '/') + 1);?>
    <div><b><?=$i?>)</b> <?=  Html::a($nameFicheiro,  "/".Url::to($file), ['target'=>'_blank'])?></div>
<?php
           }
?>
</div>