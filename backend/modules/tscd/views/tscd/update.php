<?php

use yii\helpers\Html;
   use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\tscd\models\Tscd */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tscd',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tscds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tscd-update">

    <h1><?= Html::encode($this->title) ?></h1>
 

</div>
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
             <?= $this->render('_formupdate', [
        'model' => $model,
                           'dataProvider'=>$dataProvider,
    ]) ?>                      
 
                        </div>
                    </div>
                </div>
</section>