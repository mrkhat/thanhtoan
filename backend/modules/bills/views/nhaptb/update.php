<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\Bgtbdien */
 

$this->title = 'Quản lý phiếu nhập kho dự phòng';
$this->params['breadcrumbs'][] = ['label' => 'Phiếu nhập', 'url' => ['index']];
 
$this->params['breadcrumbs'][] = 'Cập nhật nhập phiếu nhập kho dự phòng :'.$model->key;
?>
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập Nhật phiếu nhập kho dự phòng ' . $model->key;?></h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
            
         'dataProvider'=>$dataProvider,                        
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
