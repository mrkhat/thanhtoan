<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
 use common\components\Utils;
 
/* @var $this yii\web\View */
/* @var $model backend\modules\partner\models\partner */
/* @var $form yii\widgets\ActiveForm */
?>

 


     
    



<div class="row">
    
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên khách hàng"])->label("Tên khách hàng:") ?>
                                             
                                            </div>
                                        
                                            <div class="form-group">
                                             
                                                 <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder'=>"Nhập số điện thoại"])->label("Điện thoại:")?>
                                               
                                            </div>
                                                     <div class="form-group">
                                            
                                                <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder'=>"Nhập địa chỉ"])->label("Địa Chỉ:") ?>
                                              
                                            </div>
                                            <div class="form-group">
                                            
                                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder'=>"Nhập email"])->label("Email:") ?>
                                              
                                            </div>
                                            <div class="form-group">
                     
                                                <?= $form->field($model, 'birthday',[
    'template' => '{label}<div class="input-group"> <div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), [
    'clientOptions' => ['alias' =>  'dd/mm/yyyy']])->label("Ngày Sinh:") ?>
                                               
                                                 <!--/.input group--> 
                                                </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                        <?= $form->field($model, 'activate')->checkbox()?>
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
                                          
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-footer">
                                        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <button onclick="window.location.href='/customer'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>

 