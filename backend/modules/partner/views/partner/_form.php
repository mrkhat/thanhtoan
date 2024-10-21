<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên đối tác"])->label("Tên đối tác:") ?>
                                             
                                            </div>
                                            <div class="form-group">
                                         
                                                  <?= $form->field($model, 'contact')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên người liên hệ"])->label("Người liên hệ:") ?>
                                           
                                            </div>
                                            <div class="form-group">
                                                
                                                 <?= $form->field($model, 'position')->textInput(['maxlength' => true, 'placeholder'=>"Nhập chức vụ"])->label("Chức vụ:") ?>
                                              
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
                                        
                                                <?= $form->field($model, 'discount')->textInput(['maxlength' => true, 'placeholder'=>"Nhập mức chiết khấu"])->label("Mức chiết khấu(%):") ?>
                                                 
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
                                               
                                                
                                                 <?= $form->field($model, 'attach')->fileInput()->label("Tải báo giá:") ?>
                                                <?= $model->attach!=null?"<a href='".Utils::loadImage('baogia/'.$model->attach)."'>".$model->attach."</a>":""?>
                                                <p class="help-block">Định dạng file: PNG, DOC, PDF</p>
                                                <!--Tải được nhiều file cùng lúc-->
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-footer">
                                        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <button onclick="window.location.href='/partner'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>

 