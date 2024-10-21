<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\modules\tscd\models\Tscd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tscd-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box-body">
                <?= $form->field($model, 'room1')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Phòng Công Nghệ Thông Tin' : $model->room1]) ?>   
                <?= $form->field($model, 'nguoigiao')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Hồ Huy Bình' : $model->nguoigiao]) ?>
<?= $form->field($model, 'cv1')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Phụ Trách Phòng' : $model->cv1]) ?>
            </div></div>
        <div class="col-md-6">
            <div class="box-body">
                <?= $form->field($model, 'room2')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'nguoinhan')->textInput(['maxlength' => true, 'placeholder' => 'Trưởng /Phó Phòng Phụ Trách phòng']) ?>
<?= $form->field($model, 'cv2')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Trưởng Khoa/Phòng' : $model->cv2]) ?>
            </div></div>
    </div>
    <?=
    $form->field($model, 'display_date', [
        'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
    ])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'dd/mm/yyyy']])
    ?>

<?= $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Địa điểm giao nhận, lắp đặt thiết bị']) ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'item')->textInput(['maxlength' => true, 'placeholder' => 'máy vi tính/máy in']) ?>
        </div> <div class="col-md-2">
            <?=
            $form->field($model, 'unit')->dropDownList(
                    ['Bộ' => 'Bộ', 'Cái' => 'Cái']
            );
            ?>
        </div>
        <div class="col-md-2">
<?= $form->field($model, 'number')->textInput(['value' => $model->isNewRecord ? '1' : $model->number]) ?>

        </div> 
        <div class="col-md-2">
            <?php
            echo $form->field($model, 'devicekey')->widget(Select2::classname(), [

                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'multiple' => true,
                    'allowClear' => true,
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'minimumInputLength' => 1,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => \yii\helpers\Url::to(['/device/list']),
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        'processResults' => new JsExpression('function (data, params) {return {  
                                              results: $.map(data.results, function (item) {
                                                       return {id:item.name ,name:item.name  };
                            }),
                    
                        };
                    }
                '),
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(device) { return device.name }'),
                    'templateSelection' => new JsExpression('function (device) { return device.name || device.text }'),
                ],
            ]);
            ?>


        </div>
    </div>
    <div class="col-md-5">
        <?= $form->field($model, 'configuration')->textarea(['rows' => 6]) ?>
    </div> <div class="col-md-5">
<?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
    </div>
    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


 



</div>
