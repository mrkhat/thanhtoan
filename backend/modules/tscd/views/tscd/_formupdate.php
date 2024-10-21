<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\editable\Editable;
$url2 = \yii\helpers\Url::to(['/room/list']);
/* @var $this yii\web\View */

/* @var $form yii\widgets\ActiveForm */

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\tscd\models\Tscd */
/* @var $form yii\widgets\ActiveForm */
?>
<!--<div class="row">
<div class="col-md-12">-->
<div class="box-body">
    <div class="tscd-form">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <?= $form->field($model, 'room1')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Phòng Công Nghệ Thông Tin' : $model->room1]) ?>   
                    <?= $form->field($model, 'nguoigiao')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Nguyễn Tuấn Anh' : $model->nguoigiao]) ?>
                    <?= $form->field($model, 'cv1')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Phó Phòng - Phụ Trách Phòng' : $model->cv1]) ?>
                </div></div>
            <div class="col-md-6">
                <div class="box-body">
                    <?= $form->field($model, 'room2')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'nguoinhan')->textInput(['maxlength' => true, 'placeholder' => 'Trưởng /Phó Phòng Phụ Trách phòng']) ?>
                    <?= $form->field($model, 'cv2')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Trưởng Khoa/Phòng' : $model->cv2]) ?>
                </div></div>

        </div><div class="row">   
            <div class="col-md-3">
                <?=
                $form->field($model, 'display_date', [
                    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
                ])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'dd/mm/yyyy']])
                ?>
            </div>
        </div><div class="row">   
            <div class="col-md-12">
                <?= $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Địa điểm giao nhận, lắp đặt thiết bị']) ?>
            </div>
        </div><div class="row">   
            <div class="col-md-3">

                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>
        <?php ActiveForm::end(); ?>

        <?php
        $model2 = new backend\modules\tscd\models\Tscd;
        $form = ActiveForm::begin(['action' => '/tscd/create', 'options' => ['enctype' => 'multipart/form-data']])
        ?>
        <?= $form->field($model2, 'room1')->hiddenInput(['maxlength' => true, 'value' => $model->room1])->label(false) ?>        
        <?= $form->field($model2, 'nguoigiao')->hiddenInput(['maxlength' => true, 'value' => $model->nguoigiao])->label(false) ?>
        <?= $form->field($model2, 'cv1')->hiddenInput(['maxlength' => true, 'value' => $model->cv1])->label(false) ?>
        <?= $form->field($model2, 'room2')->hiddenInput(['maxlength' => true, 'value' => $model->room2])->label(false) ?>
        <?= $form->field($model2, 'nguoinhan')->hiddenInput(['maxlength' => true, 'value' => $model->nguoinhan])->label(false) ?>
        <?= $form->field($model2, 'cv2')->hiddenInput(['maxlength' => true, 'value' => $model->cv2])->label(false) ?>
        <?= $form->field($model2, 'location')->hiddenInput(['maxlength' => true, 'value' => $model->location])->label(false) ?>
        <?= $form->field($model2, 'display_date')->hiddenInput(['maxlength' => true, 'value' => $model->display_date])->label(false) ?>
        <?= $form->field($model2, 'key')->hiddenInput(['maxlength' => true, 'value' => $model->key])->label(false) ?>




        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model2, 'item')->textInput(['maxlength' => true, 'placeholder' => 'máy vi tính/máy in']) ?>
            </div> <div class="col-md-2">
                <?=
                $form->field($model2, 'unit')->dropDownList(
                        ['Bộ' => 'Bộ', 'Cái' => 'Cái']
                );
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model2, 'number')->textInput(['value' => $model->isNewRecord ? '1' : $model->number]) ?>

            </div> 
            <div class="col-md-2">
                <?php
                echo $form->field($model2, 'devicekey')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'multiple' => true,
                        'allowClear' => true,
                        'tags' => true,
                        'tokenSeparators' => [',', ' '],
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/device/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                            'processResults' => new JsExpression('function (data, params) {return {  
                                              results: $.map(data.results, function (item) {
                                                       return {id:item.name ,name:item.name  };
                            }),
                    
                        };
                    }
                '),
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text }'),
                    ],
                ]);
                ?>


            </div>

            <div class='col-md-1'style="height: 100px">  <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Thêm', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>

            <div class="col-md-4">
                <?= $form->field($model2, 'configuration')->textarea(['rows' => 6]) ?>
            </div> <div class="col-md-4">
                <?= $form->field($model2, 'note')->textarea(['rows' => 6]) ?>
            </div>



        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>

<div  class="form-group">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'toolbar' => [
            [
                'content' => Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']),
            ],],
        'filterPosition' => GridView::FILTER_POS_HEADER,
        'layout' => "<div class='box-header'>
                            
                                    <div class='col-md-12'>
                                    {summary}  
                                        </div> 
                                    </div>
                                    <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width:50px;'],],
//['attribute' => 'id', 'width'=>'50px'],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'item',
                'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                'editableOptions' => ['header' => 'Ghi Chú', 'size' => 'md', 'formOptions' => ['action' => ['/tscd/edititems']]],
                'width' => '250px'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'configuration',
              
                  'format' => 'HTML',
               'vAlign' => 'middle',
//               'headerOptions'=>['class'=>'kv-sticky-column'],
//                'contentOptions'=>['style'=>'text'],
                'editableOptions' => ['inputType' => \kartik\editable\Editable::INPUT_TEXTAREA, 'header' => 'Ghi Chú', 'size' => 'lg',  'asPopover' => false,
                     'options' => ['class'=>'form-control','rows'=>15,     'style'=>'width:400px',      'placeholder'=>'Enter notes...'    ],
                    'formOptions' => ['action' => ['/tscd/edititems']]],
                'width' => '250px'
            ],
            [

                'attribute' => 'unit',
                'format' => 'raw',
                'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
                'value' => function ($data) {
                    return '<span id="bills-unit' . $data->id . '">' . $data->unit . '</span>';
                },
                'width' => '50px'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'number',
                'width' => '50px',
                'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                'editableOptions' => ['header' => 'Số Lướng', 'size' => 'md', 'formOptions' => ['action' => ['/tscd/edititems']]],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'note',
                'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                'editableOptions' => ['inputType' => \kartik\editable\Editable::INPUT_TEXTAREA, 'header' => 'Ghi Chú', 'size' => 'md', 'formOptions' => ['action' => ['/tscd/edititems']]],
                'width' => '250px'
            ], [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'devicekey',
                'vAlign' => 'model',
                'value' => function ($data) {
                    return is_array($data->devicekey) ? implode(",", $data->devicekey) : $data->devicekey;
                },
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                'editableOptions' => function ($model, $key, $index, $widget) {
                    return[
                        'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                        'options' => [

                            'pluginOptions' => [
                                'multiple' => true,
                                'allowClear' => true,
                                'tags' => true,
                                'tokenSeparators' => [',', ' '],
                                'minimumInputLength' => 1,
                                'language' => [
                                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                ],
                                'ajax' => [
                                    'url' => \yii\helpers\Url::to(['/device/list']),
                                    'dataType' => 'json',
                                    'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                                    'processResults' => new JsExpression('function (data, params) {                                                                     return {  
                                              results: $.map(data.results, function (item) {
                                                       return {id:item.name ,name:item.name  };
                            }),
                    
                        };
                    }
                '),
                                ],
                                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                'templateResult' => new JsExpression('function(device) { return device.name }'),
                                'templateSelection' => new JsExpression('function (device) { return device.name || device.text }'),
                            ]],
                        'header' => 'Tên Thiết Bị', 'size' => 'md', 'formOptions' => ['action' => ['/tscd/edititems']]];
                },
                        'width' => '350px',
                    ],
                    // 'note:ntext',
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width' => '150px',
                        'template' => '{delete}',
                        'buttons' => [

                            'delete' => function ($url, $model) {

                                return Html::a('<span class="label label-danger">Xóa</span>', $url, ['title' => "Delete",
                                            'data-confirm' => 'Bạn có chắc muốn phiếu này?',
                                            'data-method' => "post",
                                            'data-pjax' => "0"]);
                            }
                                ],
                            ],
                        ],
                    ]);
                    ?>
</div>
<!--</div></div>-->