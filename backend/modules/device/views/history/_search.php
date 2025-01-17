<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\SearchHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-location-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lever') ?>

    <?= $form->field($model, 'departments') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'room_name') ?>

    <?php // echo $form->field($model, 'room_number') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'device_id') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
