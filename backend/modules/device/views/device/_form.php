<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">
                <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'placeholder' => "Nhập Loại Thiết Bị:PC|SC"])->label("Loại Thiết Bị:") ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'placeholder' => "Nhập Mã Thiết Bị"])->label("Mã Thiết Bị:") ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'model')->textInput(['maxlength' => true, 'placeholder' => "Nhập Model"])->label("Model:") ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'serrial')->textInput(['maxlength' => true, 'placeholder' => "Nhập serrial"])->label("Serrial:") ?>
            </div>
            
            <div class="form-group">
                <?=   \Yii::$app->user->identity->role > 20 ? $form->field($model, 'price')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => [ 'alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true,]])->label("Giá bao gồm VAT 10%:"):""; ?>

            </div>
             <div class="form-group">
                <?= $form->field($model, 'nhacungcap')->textInput(['maxlength' => true, 'placeholder' => "Nhập nhà Cung Cấp"])->label("Nhà Cung Cấp:") ?>

            </div>


            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
    </div>
    <div class="col-md-6">
        <div class="box-body">
            <div class="form-group">
                <?= $form->field($model, 'configuration')->textarea(['maxlength' => true, 'rows' => "12", 'placeholder' => "Nhập cấu hình"])->label("Cấu hình ban đầu:") ?>
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

