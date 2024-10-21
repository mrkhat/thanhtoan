<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\Payment\models\Payment */


$this->title = 'Quản lý chi';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý chi', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới chi";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới chi</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>