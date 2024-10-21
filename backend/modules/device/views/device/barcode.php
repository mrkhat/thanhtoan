<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-view">

 
<div class="device-search">

    <?php $form = ActiveForm::begin([ 
        'action' => ['printbarcode'], 
        'options'=>["target"=>"_bank"],
        'method' => 'get',
    ]); ?>

 

 <?= Html::textarea('barcode','') ?>

 

    <div class="form-group">
        <?= Html::submitButton('print', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    

</div>
