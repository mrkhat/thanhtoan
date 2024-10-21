<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\users\models\Users;
use backend\modules\project\models\Project;
use yii\helpers\ArrayHelper;
use common\components\Utils;

/* @var $this yii\web\View */
/* @var $model backend\modules\recive\models\recive */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                           
                                    <div class="col-md-6">
                                        <div class="box-body">
                                            <div class="form-group">
                                            
                                                 <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>"Nhập lý do thu"])->label("Lý do thu:") ?>
                                             
                                            </div>
                                               <div class="form-group">
                                             
                                          <?= $form->field($model, 'receiver')->dropDownList
(									ArrayHelper::map(Users::find([ ])->where('status=1 and role < 30')->all(), 'id', 'first_name'),
                                    ['options'=>[\Yii::$app->user->id =>['Selected'=>true]],'prompt' => Yii::t('app', '--------------'), 'class'=>'form-control']
		)->label('Người thu');?>
                                               
                                            </div>
                                            <div class="form-group">
                                                  <?= $form->field($model, 'money')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => [ 'alias' => 'decimal','groupSeparator' => ',','autoGroup' => true,'removeMaskOnSubmit' => true,]])->label("Tổng số tiền:"); ?>
                                            </div>
                                                <div class="form-group">
                                            
                                               <?= $form->field($model, 'project_id')->dropDownList(
									ArrayHelper::map(Project::findAll(['status'=>0]), 'id', 'name'),
                                    ['prompt' => Yii::t('app', 'Chọn dự án'), 'class'=>'form-control']
		)->label('Dự án');?>
                                            </div>
                                             <div class="form-group">
                                            
                                               <?= $form->field($model, 'step')->dropDownList(
							[1=>'Giai đoạn 1',2=>'Giai đoạn 2',3=>'Giai đoạn  3',4=>'Giai đoạn  4',5=>'Giai đoạn  5',6=>'Giai đoạn  6',7=>'Giai đoạn  7',8=>'Giai đoạn  8',9=>'Giai đoạn  9',10=>'Giai đoạn  10',],
                                    ['prompt' => Yii::t('app', 'Chọn giai đoạn'), 'class'=>'form-control']
		)->label('Giai Đoạn');?>
                                            </div>
                                            <div class="form-group">
                                             
                                                 <?= $form->field($model, 'deliver')->textInput(['maxlength' => true, 'placeholder'=>"Nhập tên người đưa"])->label("Nhận từ ai:")?>
                                               
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
                                               
                                                
                                                 <?= $form->field($model, 'attach')->fileInput()->label("Tải giấy nhận tiền:") ?>
                                                <?= $model->attach!=null?"<a href='".Utils::loadImage('phieuthu/'.$model->attach)."'>".$model->attach."</a>":""?>
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

 