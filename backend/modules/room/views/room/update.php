<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\room\models\Room */


$this->title = 'Quản lý danh mục khoa phòng';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý danh mục khoa phòng', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Cập nhật khoa phòng";
?>

<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập nhật khoa phòng: ' . $model->name;?></h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
