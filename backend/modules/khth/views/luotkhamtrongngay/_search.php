<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\LuotkhamtrongngaySreach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="luotkhamtrongngay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'phongban_ID') ?>

    <?= $form->field($model, 'ngaykham') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'opt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
