<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\customer\models\customer */


$this->title = 'Quản lý khách hàng';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới khách hàng";
?>
 
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới khách hàng</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>