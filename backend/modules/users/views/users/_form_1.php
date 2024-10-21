<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\users\models\UserTypes;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['value'=>"123456"])->label('Password') ?>
        <?=  $model->password_hash?$form->field($model, 'password_new')->passwordInput(['value'=>''])->label('New Password'):"" ?>
 
    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(UserTypes::findAll(['status'=>1]), 'id', 'type'),['prompt' => Yii::t('app', 'Please choose Role'), 'class'=>'form-control'])->label('Role');;?>


<?= $form->field($model, 'status')->radioList(['1'=>Yii::t('app', 'Active'),0=>Yii::t('app', 'In-Active')])->label('Status'); ?>
 
 

 
 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
