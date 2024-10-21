<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\partner\models\partner */

$this->title = 'Quản lý đối tác';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý đối tác', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Tạo mới đối tác";
?>
 
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Tạo mới đối tác</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>