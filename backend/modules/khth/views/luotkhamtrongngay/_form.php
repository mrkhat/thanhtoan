<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Luotkhamtrongngay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="luotkhamtrongngay-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phongban_ID')->textInput() ?>

    <?= $form->field($model, 'ngaykham')->textInput() ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'opt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
