<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\users\models\Users;
use backend\modules\project\models\Project;
use yii\helpers\ArrayHelper;
use common\components\Utils;

/* @var $this yii\web\View */
/* @var $model backend\modules\Worklist\models\WorkList */
/* @var $form yii\widgets\ActiveForm */
?>
 

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="row">
    

                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên công việc"])->label("Tên công việc:") ?>
                                             
                                            </div>
                                        
                                             <div class="form-group">
                                             
                                          <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(Users::find([ ])->where('status=1 and role < 30')->all(), 'id', 'first_name'),
                                                 

                                    [ 'options'=>[\Yii::$app->user->id =>['Selected'=>true]],'prompt' => Yii::t('app', '--------------'), 'class'=>'form-control']
		)->label('Người chỉ định');?>
                                               
                                            </div>
                                                  
                                        
                                             <div class="form-group">
                                                <div class="checkbox">
                                                        <?= $form->field($model, 'urgent')->checkbox()->label(false)?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                        <?= $form->field($model, 'status')->checkbox()->label(false)?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               
                                                
                                                 <?= $form->field($model, 'attach')->fileInput()->label("Tải đính kèm:") ?>
                                                <?= $model->attach!=null?"<a href='".Utils::loadImage('worklist/'.$model->attach)."'>".$model->attach."</a>":""?>
                                                <p class="help-block">Định dạng file: PNG, DOC, PDF</p>
                                                <!--Tải được nhiều file cùng lúc-->
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
      <button onclick="window.location.href='/worklist'" type="button" class="btn btn-default">Hủy</button>
                                        </div>

    
                                        
                                      
                                    </div>
                                </div>
                                    <?php ActiveForm::end(); ?>
                            </div>

 