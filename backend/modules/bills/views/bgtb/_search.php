<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\SearchBgtbdien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bgtbdien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'key') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'groupid') ?>

    <?php // echo $form->field($model, 'roomid') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'deliver') ?>

    <?php // echo $form->field($model, 'receiver') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'display_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'status1') ?>

    <?php // echo $form->field($model, 'status2') ?>

    <?php // echo $form->field($model, 'note2') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'roomname') ?>

    <?php // echo $form->field($model, 'item') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'groupname') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
