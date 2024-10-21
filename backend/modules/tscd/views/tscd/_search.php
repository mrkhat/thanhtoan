<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\tscd\models\TscdSreach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tscd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'display_date') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'nguoigiao') ?>

    <?= $form->field($model, 'cv1') ?>

    <?php // echo $form->field($model, 'room1') ?>

    <?php // echo $form->field($model, 'nguoinhan') ?>

    <?php // echo $form->field($model, 'cv2') ?>

    <?php // echo $form->field($model, 'room2') ?>

    <?php // echo $form->field($model, 'item') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'configuration') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
