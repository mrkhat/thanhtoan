<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\DeviceLocation */

$this->title = 'Lý Lịch Máy';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý thiết bị', 'url' => ['/device']];
$this->params['breadcrumbs'][] = ['label' => 'Lý Lịch Máy', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Thêm Lý Lịch";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Thêm Lý Lịch</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
