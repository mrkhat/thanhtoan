<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dntt\models\dntt */

$this->title = 'Quản lý phiếu đề nghị thanh toán';
$this->params['breadcrumbs'][] = ['label' => 'Quản phiếu đề nghị thanh toán', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Cập nhật phiếu";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập phiếu: ' . $model->name;?></h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
