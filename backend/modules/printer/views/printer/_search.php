<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\printer\models\PrinterSreach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'instore') ?>

    <?= $form->field($model, 'key') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'day_delivery') ?>

    <?php // echo $form->field($model, 'day_manufacture') ?>

    <?php // echo $form->field($model, 'day_instore') ?>

    <?php // echo $form->field($model, 'room') ?>

    <?php // echo $form->field($model, 'note2') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'Serrial') ?>

    <?php // echo $form->field($model, 'Type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
