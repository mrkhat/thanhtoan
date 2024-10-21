<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\repair_printer\models\Repair_printerSreach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repair-printer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>



    <?= $form->field($model, 'Ngay') ?>

    <?= $form->field($model, 'loaimay') ?>

    <?= $form->field($model, 'noidungsuachua') ?>

    <?php // echo $form->field($model, 'mathietbi') ?>

    <?php // echo $form->field($model, 'serrial') ?>

    <?php // echo $form->field($model, 'SL') ?>

    <?php // echo $form->field($model, 'room') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
