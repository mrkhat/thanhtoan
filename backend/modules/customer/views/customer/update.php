<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\partner\models\partner */

$this->title = 'Quản khách hàng';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
 
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập Nhật khách hàng: ' . $model->name;?></h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>