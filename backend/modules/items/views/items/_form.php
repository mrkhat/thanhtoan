<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
    use yii\web\JsExpression;
  use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-information-form">

    <?php $form = ActiveForm::begin(); ?>

 

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

 
    <?php $name = empty($model->type) ? '' :$model->typename?>
    <?= $form->field($model, 'type')->widget(Select2::classname(), [
   'initValueText' => $name, // set the initial display text
                    'options' => ['placeholder' => 'Nhập nhóm thiết bị ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/itemtype/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) {return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
                ]);
                ?>

   <?= $form->field($model, 'status')->checkbox()?>
   <?= $form->field($model, 'option')->checkbox()?>
   <?= $form->field($model, 'option2')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
