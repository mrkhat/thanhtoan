<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */

$this->title = 'Quản lý thiết bị';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý thiết bị', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới thiết bị";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới thiết bị</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
