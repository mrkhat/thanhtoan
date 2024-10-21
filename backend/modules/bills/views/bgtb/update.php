<?php

use yii\helpers\Html;
   use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\Bgtbdien */
 

$this->title = 'Update Bills: ' . $model->key;
$this->params['breadcrumbs'][] = ['label' => 'Cập Nhật Phiếu Bàn Giao Thiết Bị', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title"><?= 'Cập Nhật Phiếu Giao: ' . $model->key;?></h3>
    
                                <?=  Html::a('', Url::to(['print','id'=>$model->key]), ['link'=>Url::to(['print','id'=>$model->key]),  'style'=>'float:right','class'=>'btn btn-default fa fa-print label-info','target'=>'_blank']); ?>
   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
            
         'dataProvider'=>$dataProvider,                        
    ]) ?>
                        </div>
                    </div>
                </div>
</section>
