<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use backend\modules\room\models\Room;
$url2=\yii\helpers\Url::to(['/room/list']);
$url=\yii\helpers\Url::to(['/mayin/list']);
/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">

            </div>
            <div class="form-group">

                <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'placeholder' => "Nhập Mã Thiết Bị"])->label("Mã Thiết Bị:") ?>

            </div>

            <div class="form-group">
            
           
            
            
            <?php
                echo $form->field($model, 'model')->widget(Select2::classname(), [
 
//                     'initValueText' => $name, // set the initial display text
                    'options' => ['placeholder' => 'tên thiết bị ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                                'tags' => true,

                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) {return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
                ])->label('Loại thiết bị');
            ?>
            
            
            </div>
             <div class="form-group">

                <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'placeholder' => "KIM|BARCODE|TD|M|DCN|2MAT|NHIỆT|"])->label("Phân loại máy in:") ?>

            </div>
            <div class="form-group">
                <?= $form->field($model, 'serrial')->textInput(['maxlength' => true, 'placeholder' => "Nhập serrial"])->label("serrial:") ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'price')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => [ 'alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true,]])->label("Giá bao gồm VAT 10%:"); ?>

            </div>
            <div class="form-group">
          <?php
                 $name = empty($model->id) ? '' : Room::find()->where(['id'=>$model->departments_id])->one();
//                      
                 $name= is_null($name)?"Nhập Khoa Phòng":$name->name;
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
        <?= $form->field($model, 'day_delivery',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'dd/mm/yyyy']])->label('Ngày giao')?>
   </div>
 

            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
    </div>
    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">
               <?= $form->field($model, 'company')->textInput(['maxlength' => true, 'placeholder' => "Nhập Tên Công Ty Cấp"])->label("Công Ty:") ?>
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

