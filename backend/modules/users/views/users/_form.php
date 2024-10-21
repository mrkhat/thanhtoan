<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\users\models\UserTypes;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    

<div class="row">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?php $user_role=\Yii::$app->user->identity->role;
if($user_role==30){
?>
    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">

  <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'placeholder' => "Nhập họ tên"])->label('Họ tên'); ?>
            </div>
            <div class="form-group">

                <?=
                $form->field($model, 'last_name')->dropDownList
                        (Yii::$app->params['position'], ['prompt' => Yii::t('app', 'Chọn vị trí'), 'class' => 'form-control']
                )->label('Vị trí');
                ?>

            </div>
            <div class="form-group">
  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => "Nhập email"]) ?>            </div>
            <div class="form-group">
<?= $form->field($model, 'password_hash')->passwordInput(['value'=>"123456"])->label('Mật khẩu') ?>
<?=  $model->password_hash?$form->field($model, 'password_new')->passwordInput(['value'=>''])->label('New Password'):"" ?>
            </div>
            <div class="form-group">
            <?= $form->field($model, 'password_repeat')->passwordInput(['value'=>''])->label('Nhập lại mật khẩu')?>
                </div>
          
               <div class="form-group">


<?= $form->field($model, 'attach')->fileInput()->label("Hình đại diện:") ?>
                <p class="help-block">Định dạng file: PNG, JPG</p>
                <!--Tải được nhiều file cùng lúc-->
            </div>
            <div class="form-group">
                                        <?= $form->field($model, 'role')->radioList(ArrayHelper::map(UserTypes::findAll(['status'=>1]), 'id', 'type'),[ 'class'=>'form-control'])->label('Quyền quản trị');?>         
                                            </div>

                                            <div class="form-group">
                                                  <?= $form->field($model, 'status')->checkbox()?>
                                            </div>

            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
    </div>
     

</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-footer">
            <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                <button onclick="window.location.href = '/users'" type="button" class="btn btn-default">Hủy</button>
            </div>




        </div>
    </div>
<?php }else {
    ?>
          <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">

  <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'placeholder' => "Nhập họ tên"])->label('Họ tên'); ?>
            </div>
 
            <div class="form-group">
  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => "Nhập email"]) ?>            </div>
            <div class="form-group">
<?= $form->field($model, 'password_hash')->passwordInput(['value'=>"123456"])->label('Mật khẩu') ?>
<?=  $model->password_hash?$form->field($model, 'password_new')->passwordInput(['value'=>''])->label('New Password'):"" ?>
            </div>
            <div class="form-group">
            <?= $form->field($model, 'password_repeat')->passwordInput(['value'=>''])->label('Nhập lại mật khẩu')?>
                </div>
          
               <div class="form-group">


<?= $form->field($model, 'attach')->fileInput()->label("Hình đại diện:") ?>
                <p class="help-block">Định dạng file: PNG, JPG</p>
                <!--Tải được nhiều file cùng lúc-->
            </div>
          

            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
    </div>
     

</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-footer">
            <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Hoàn Thành' : 'Hoàn Thành', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                <button onclick="window.location.href = '/users'" type="button" class="btn btn-default">Hủy</button>
            </div>




        </div>
    </div>
        <?php
}
?>
<?php ActiveForm::end(); ?>
</div>
</div>
