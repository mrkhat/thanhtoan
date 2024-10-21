<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\Select2;
 use common\components\Utils;
  use backend\modules\customer\models\Customer;
  use yii\helpers\ArrayHelper;
use yii\helpers\Json;
  use dosamigos\fileupload\FileUploadUI;
/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */
/* @var $form yii\widgets\ActiveForm */
?>

 


     
    



<div class="row">
    
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên dự án"])->label("Tên dự án:") ?>
                                             
                                            </div>
                                        
                                            <div class="form-group">
                                             <?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Customer::findAll(['activate'=>1]), 'id', 'name'),
    'options' => ['placeholder' => Yii::t('app', 'Chọn khách hàng')],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label('Khách hàng');?>
                                        
                                               
                                            </div>
                                                    <div class="form-group">
                                                  <?= $form->field($model, 'money')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => [ 'alias' => 'decimal','groupSeparator' => ',','autoGroup' => true,'removeMaskOnSubmit' => true,]])->label("Tổng số tiền:"); ?>
                                            </div>
                                        
                                            <div class="form-group">
                    
                                                <?= $form->field($model, 'guarantee',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'mm/dd/yyyy']])->label("Ngày bảo hành") ?>
                                               
                                         
                                                </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                        <?= $form->field($model, 'status')->checkbox()?>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="col-md-6">
                                       <div class="box-body">
                                            <div class="form-group">
                                               
                                                 <?= $form->field($model, 'note')->textarea(['maxlength' => true,'rows'=>"12",'placeholder'=>"Nhập ghi chú"])->label("Ghi chú:") ?>
                                               
                                            </div>
                                            <div class="form-group">
                                               <?php if(Yii::$app->controller->action->id!=='update'){?>
                                                
                                                 <?= $form->field($model, 'attach')->fileInput()->label("Tải hợp đông:") ?>
                                                <?= $model->attach!=null?"<a href='".Utils::loadImage('hopdong/'.$model->attach)."'>".$model->attach."</a>":""?>
                                                <p class="help-block">Định dạng file: PNG, DOC, PDF</p>
                                                <!--Tải được nhiều file cùng lúc-->
                                               <?php }else{?>
                                                
                                                
                                            <?= FileUploadUI::widget([
	'model' => $model,
	'attribute' => 'attach',
	'url' => ['image-upload', 'id' => $model->id],
 
	    'gallery' => true,
    'fieldOptions' => [
        'accept' => 'image/*'
    ],
    'clientOptions' => [
        'maxFileSize' => 8000000
    ],
    // ...
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]); ?>

                                               <?php }?>                                            </div>
                                        </div>
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-footer">
                                        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <button onclick="window.location.href='/dntt'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>

 <?php 
$attach= Json::decode($model->attach);
$html="";
if(count($attach)){
foreach ($attach as $item){
    $filename=Utils::loadImage('hopdong/'.$item);
        $html.='<tr class="template-download fade in"><td><p class="name"><a href="'.$filename.'" title="'.$filename.'" download="'.$filename.'" data-gallery="">'.$item.'</a></p></td><td><span class="size">-</span></td><td><button class="btn btn-danger delete" data-type="POST" data-url="imagedelete?name='.$item.'&id='.$model->id.'"><i class="glyphicon glyphicon-trash"></i><span>Delete</span></button><input type="checkbox" name="delete" value="1" class="toggle"></td></tr>';
}
       $js = "
           
     $('.files').html('".$html."');";
            $this->registerJs($js);
}?>