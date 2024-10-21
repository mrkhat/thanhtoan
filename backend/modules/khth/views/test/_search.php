<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\TestSreach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'it') ?>

    <?= $form->field($model, 'column_1') ?>

    <?= $form->field($model, 'column_2') ?>

    <?= $form->field($model, 'column_3') ?>

    <?= $form->field($model, 'column_4') ?>

    <?php // echo $form->field($model, 'column_5') ?>

    <?php // echo $form->field($model, 'column_6') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
