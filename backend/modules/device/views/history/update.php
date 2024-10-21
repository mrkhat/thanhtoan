<?php

use yii\helpers\Html;
use backend\modules\device\models\DeviceInformation;
   use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\DeviceLocation */


$this->title = 'Lý Lịch Máy';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý thiết bị', 'url' => ['/device']];
$this->params['breadcrumbs'][] = ['label' => 'Lý Lịch Máy', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Cập Nhật Lý Lịch";
?>
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập nhật thiết bị: '. DeviceInformation::find()->where(['id'=>$model->device_id])->one()->name?></h3>
    
                     <?= \Yii::$app->user->identity->id==$model->created_by? Html::a('<span class="label label-danger">Xóa</span>', Url::to(['delete','id'=>$model->id]), ['title' => "Delete",'style'=>'float:right',
                                            'data-confirm' => 'Bạn có chắc muốn phiếu này?',
                                            'data-method' => "post",
                                            'data-pjax' => "0"]):""; ?>
   
   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
