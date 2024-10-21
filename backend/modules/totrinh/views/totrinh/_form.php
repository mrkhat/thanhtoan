<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\totrinh\models\totrinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="totrinh-form">

    <?php $form = ActiveForm::begin(); ?>
      <div class="form-group">
         <table class="col-md-12">
            <tr>
   <td  class='col-md-3'style="height: 100px">
     
 <?= $form->field($model, 'number')->textInput(['maxlength' => 4,'placeholder'=>isset($MaxNumberThisYear)?$MaxNumberThisYear:""]) ?></td>
  <td  class='col-md-9'style="height: 100px">
            <?= $form->field($model, 'date_display',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'dd/mm/yyyy']]) ?>
   
  </td>
            </tr></table></div>
    
     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>



  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
