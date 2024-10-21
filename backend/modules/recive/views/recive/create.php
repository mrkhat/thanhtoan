<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\recive\models\recive */

$this->title = 'Quản lý thu';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý chi', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới phiếu thu";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới phiếu thu</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
