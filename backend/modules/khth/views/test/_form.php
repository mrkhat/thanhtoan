<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'it')->textInput() ?>

    <?= $form->field($model, 'column_1')->textInput() ?>

    <?= $form->field($model, 'column_2')->textInput() ?>

    <?= $form->field($model, 'column_3')->textInput() ?>

    <?= $form->field($model, 'column_4')->textInput() ?>

    <?= $form->field($model, 'column_5')->textInput() ?>

    <?= $form->field($model, 'column_6')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
