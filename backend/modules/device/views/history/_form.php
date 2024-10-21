<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;
use backend\modules\device\models\DeviceInformation;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\DeviceLocation */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['/device/list']);
$url2=\yii\helpers\Url::to(['/room/list']);
 
 
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">
                <?php
                $create=Yii::$app->controller->action->id=="create"?true:FALSE;
              $data='';
             if(!$create){
                $name = empty($model->device_id) ? '' : DeviceInformation::find()->where(['id'=>$model->device_id])->all();
                
                $data = ArrayHelper::map($name, 'id', 'name');
                     echo $form->field($model, 'device_id')->widget(Select2::classname(), [
                      'data' => $data, 
                     
                    'options' => ['placeholder' => 'Chọn thiết bị ...',
                        
                        ],
                    'pluginOptions' => [
                     'tags' => true,
                     'tokenSeparators' => [',', ' '],
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                         ],
                        
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { $("#devicelocation-user").val(device.user);$("#devicelocation-lever").val(device.lever);$("#devicelocation-departments").val(device.departments);   return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
                ])->label('Thiết Bị'); 
                
             }else{
              
                echo $form->field($model, 'device_id')->widget(Select2::classname(), [
                    
                     
                    'options' => ['placeholder' => 'Chọn thiết bị ...',
                      'multiple'=> true,
                        ],
                    'pluginOptions' => [
                     'tags' => true,
                     'tokenSeparators' => [',', ' '],
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                         ],
                        
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { $("#devicelocation-user").val(device.user);$("#devicelocation-lever").val(device.lever);$("#devicelocation-departments").val(device.departments);   return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
             ])->label('Thiết Bị');}
                ?>
            </div>
             <div class="form-group">

<?= $form->field($model, 'user')->textInput(['maxlength' => true, 'placeholder' => "User"])->label("User:") ?>

            </div>
            <div class="form-group">

<?= $form->field($model, 'lever')->textInput(['maxlength' => true, 'placeholder' => "Tầng"])->label("Tầng:") ?>

            </div>
            <div class="form-group">

 
                <?php
                 $name = empty($model->device_id) ? '' : DeviceInformation::find()->where(['id'=>$model->device_id])->one()->departments;
 
                echo $form->field($model, 'departments_id')->widget(Select2::classname(), [
 
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
            </div>                                       
        <div class="form-group">

<?= $form->field($model, 'room_name')->textInput(['maxlength' => true, 'placeholder' => "Phòng"])->label("phòng:") ?>

            </div>
               <div class="form-group">
                        <?php $model->date = is_null($model->date)?date("d/m/Y"):$model->date   ?>
                                                <?= $form->field($model, 'date',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'dd/mm/yyyy']])->label("Ngày Thực Hiện ") ?>
                                               
                                         
                                                </div></div>
        <!-- /.box-body -->
    </div>
    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">

<?= $form->field($model, 'note')->textarea(['maxlength' => true, 'rows' => "12", 'placeholder' => "Nhập ghi chú"])->label("Ghi chú:") ?>

            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-footer">
            <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                <button onclick="window.location.href = '/device'" type="button" class="btn btn-default">Hủy</button>
            </div>




        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>

