<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\room\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

 


<div class="row">
    
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Tên Khoa phòng"])->label("Khoa Phòng:") ?>
                                             
                                            </div>
                                      
                                           
                                            <div class="form-group">
                                                  <?= $form->field($model, 'lever')->textInput(['maxlength' => true, 'placeholder'=>"Nhập Tầng"])->label("Tầng:") ?>
                                            </div>
                                      <div class="form-group">
                                                  <?= $form->field($model, 'suggest')->textInput(['maxlength' => true, 'placeholder'=>"Nhập gợi ý"])->label("Nhắc lệnh:") ?>
                                            </div>
                                                   <div class="form-group">
                                                   <?= $form->field($model, 'status')->checkbox()?>
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
      <button onclick="window.location.href='/room'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>
