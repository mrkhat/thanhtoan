<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use backend\modules\room\models\Room;
use backend\modules\repair_printer\models\Printer;
use backend\modules\repair_printer\models\repair_printer;
   use yii\web\JsExpression;
   $url2=\yii\helpers\Url::to(['/room/list']);

/* @var $this yii\web\View */
/* @var $model backend\modules\repair_printer\models\repair_printer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repair-printer-form">
    
    
        <?php 
        $seriall=   (Printer::find()->where([ 'key'=> $model->printerkey])->one());
        $totalrepare= $model->printerkey==""?0:count(repair_printer::findAll([ 'printerkey'=> $model->printerkey]));
 
        $seriall = is_null($seriall)?"không tồn tại":$seriall->Serrial;
        $printerkey=   Printer::find()->where([ 'Serrial'=> $model->serrial])->one();
        $printerkey=   is_null($printerkey)?"không tồn tại":$printerkey->key;
        $name = ($model->roomid)==0 ? $model->room :Room::findOne($model->roomid)->name ?>
    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'roomid')->widget(Select2::classname(), [
   'initValueText' => $name, // set the initial display text
                    'options' => ['placeholder' => 'Nhập Khoa Phòng ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url2,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) {return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
                ])->label('Khoa Phòng');
                ?>
     <?= $form->field($model, 'Ngay',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'dd/mm/yyyy']])?>

 

    <?= $form->field($model, 'loaimay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noidungsuachua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'printerkey')->textInput(['maxlength' => true])->label("Mã thiết Bị $model->printerkey tương ứng $seriall đã sửa $totalrepare lần" ) ?>

    <?= $form->field($model, 'serrial')->textInput(['maxlength' => true])->label("Seriall $model->serrial tương ứng $printerkey") ?>
    <div class="form-group">
    
 
<?= Html::label("số lần sửa chữa $totalrepare ", " ", ['class' => 'control-label ']) ?>
    </div>
    <?= $form->field($model, 'SL')->textInput(['maxlength' => true]) ?>

 

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
