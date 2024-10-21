<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\Utils;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemType */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
   <?php $form = ActiveForm::begin(); ?>
                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhóm thiét bị"])->label("Tên nhóm:") ?>
                                             
                                            </div>
                                      
                                           <div class="box-body">
                                            <div class="form-group">
                                               
                                                 <?= $form->field($model, 'note')->textarea(['maxlength' => true,'rows'=>"12",'placeholder'=>"Nhập ghi chú"])->label("Ghi chú:") ?>
                                               
                                            </div>
                                           
                                        </div>
                                  
                                      <div class="form-group">
                                            
                                               <?= $form->field($model, 'group')->dropDownList(
									Utils::LGItem(),
                                    ['prompt' => Yii::t('app', 'Chọn dự án'), 'class'=>'form-control']
		)->label('Nhóm Thiết Bị');?>
                                            </div>
                                                   <div class="form-group">
                                                   <?= $form->field($model, 'status')->checkbox()?>
                                            </div>
                                            
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-footer">
                                        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <button onclick="window.location.href='/itemtype'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>
