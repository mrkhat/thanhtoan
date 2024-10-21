<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */


$this->title = 'Quản lý dự án';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý dự án', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới dự án";
?>
 
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới dự án</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>