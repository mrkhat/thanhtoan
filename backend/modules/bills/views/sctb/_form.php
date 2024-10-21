<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use backend\modules\room\models\Room;
 use kartik\widgets\Select2;
 use yii\helpers\ArrayHelper;
   use yii\web\JsExpression;
   $url2=\yii\helpers\Url::to(['/room/list']);
/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\bills */
/* @var $form yii\widgets\ActiveForm */
   use yii\bootstrap\Modal;
   use backend\modules\device\models\DeviceInformation;
use kartik\grid\GridView;
use backend\modules\bills\models\Bills;
$user_role=\Yii::$app->user->identity->role;

$readOnly=($user_role==20||$user_role==30)?false:true;
?>

<div class="row">
 

  <div class="col-md-12">
    <div class="box-body">
           <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="form-group">
   
 
        <?php $name = empty($model->roomid) ? '' :$model->roomname?>
         </div>
           <div class="form-group">
  <?= $form->field($model, 'roomid')->widget(Select2::classname(), [
   'initValueText' => $name, // set the initial display text
                    'options' => ['placeholder' => 'Nhập Khoa Phòng ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url2,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) {return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
                ])->label('Khoa Phòng');
                ?>
    </div>
       
           <div class="form-group">
               
    <?= $form->field($model, 'deliver')->textInput(['maxlength' => true,'readOnly'=> $readOnly,'value'=>$model->deliver?$model->deliver:\Yii::$app->user->identity->first_name]) ?>
  </div>
           <div class="form-group">
    <?= $form->field($model, 'receiver')->textInput(['maxlength' => true]) ?>
   </div>
 
            <div class="form-group">
               
    <?= $form->field($model, 'note2')->textInput(['maxlength' => true]) ?>
  </div>
        <div class="form-group">
       
        <?= $form->field($model, 'display_date',[
    'template' => '{label}<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div>'
])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'dd/mm/yyyy']])?>
   </div> 
       
        <div class="form-group">
        <?= $form->field($model, 'status')->checkbox() ?>
            </div>
        
         <?php if(!$model->isNewRecord){
             $model2=new Bills;
             ?>
          <td  class='col-md-2'style="height: 100px">  <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></td>
         <?php ActiveForm::end();
         
             $form = ActiveForm::begin(['action'=>'/suachuathietbi/create','options' => ['enctype' => 'multipart/form-data']]) ?>
              <?= $form->field($model2, 'type')->hiddenInput(['maxlength' => true,'value'=>$model->type])->label(false) ?>        
              <?= $form->field($model2, 'roomid')->hiddenInput(['maxlength' => true,'value'=>$model->roomid])->label(false) ?>
              <?= $form->field($model2, 'note2')->hiddenInput(['maxlength' => true,'value'=>$model->note2])->label(false) ?>
              <?= $form->field($model2, 'deliver')->hiddenInput(['maxlength' => true,'value'=>$model->deliver])->label(false) ?>
              <?= $form->field($model2, 'receiver')->hiddenInput(['maxlength' => true,'value'=>$model->receiver])->label(false) ?>
              <?= $form->field($model2, 'source')->hiddenInput(['maxlength' => true,'value'=>$model->source])->label(false) ?>
              <?= $form->field($model2, 'status')->hiddenInput(['maxlength' => true,'value'=>$model->status])->label(false) ?>
              <?= $form->field($model2, 'display_date')->hiddenInput(['maxlength' => true,'value'=>$model->display_date])->label(false) ?>
              <?= $form->field($model2, 'key')->hiddenInput(['maxlength' => true,'value'=>$model->key])->label(false) ?>

        <div class="form-group">
         <table class="col-md-12">
            <tr>
                <td class="col-md-3" style="height: 100px">
 <?= $form->field($model2, 'itemid')->widget(Select2::classname(), [
   'initValueText' => '', // set the initial display text
                    'options' => ['placeholder' => 'Nhập thiết bi ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/items/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term,g:2}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { $("#bills-unit").html(device.unit);$("#bills-number").val("1"); return device.name || device.text; }'),
                    ],
                ])->label('Thiết Bị')?> </td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model2, 'serial')->textInput(["id"=>'bills-serial','maxlength' => true]) ?></td>
                <td  class='col-md-1'style="height: 100px "id="bills-unit"> </td>
                <td  class='col-md-1'style="height: 100px"> <?= $form->field($model2, 'number')->textInput(["id"=>'bills-number','maxlength' => true,'value'=>'0']) ?></td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model2, 'note')->textInput(["id"=>'bills-note','maxlength' => true]) ?></td>
                 <td  class='col-md-1'style="height: 100px">  <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Thêm', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></td>
            
            </tr>
        </table>
         
         </div>
        
         <?php   }else{
         
                 ?>
    
         <div class="form-group">
         <table class="col-md-12">
            <tr>
                <td class="col-md-3" style="height: 100px">
 <?= $form->field($model, 'itemid')->widget(Select2::classname(), [
   'initValueText' => '', // set the initial display text
                    'options' => ['placeholder' => 'Nhập thiết bi ...'],
                    'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/items/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term,g:2}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { $("#bills-unit").html(device.unit);$("#bills-number").val("1"); return device.name || device.text; }'),
                    ],
                ])->label('Thiết Bị')?> </td>
                
                <td  class='col-md-1'style="height: 100px "id="bills-unit"> </td>
                <td  class='col-md-1'style="height: 100px"> <?= $form->field($model, 'number')->textInput(["id"=>'bills-number','maxlength' => true,'value'=>'0']) ?></td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model, 'note')->textInput(["id"=>'bills-note','maxlength' => true]) ?></td>
                 <td  class='col-md-1'style="height: 100px">  <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Thêm', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></td>
            
            </tr>
        </table>
         
         </div>
         
         <?php }?>
          
          <?php ActiveForm::end();?>
    </div>
       <?php if(!$model->isNewRecord){?>
        <div  class="form-group">
       <?=            GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
 
              
                'toolbar' => [
        [
            'content'=>     Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ,
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
            ['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'width:50px;'],],
['attribute' => 'id', 'width'=>'50px'],
                 [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'itemid',
        'vAlign'=>'model',
                       'value'=>function ($model, $key, $index, $widget) { 
                return $model->item;         
                 }, 
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>function ($model, $key, $index, $widget) {return[
        'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
        
            'options' =>  [
                  
                   'pluginOptions' => [
                     'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/items/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term,g:2}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name+"|"+device.unit; }'),
                        'templateSelection' => new JsExpression('function (device) {$("#bills-unit'.$key.'").html(device.unit);  return device.name+"|"+device.unit || device.text }'),
            ]],
            'header'=>'Tên Thiết Bị', 'size'=>'md','formOptions' => ['action' => ['/suachuathietbi/edititems']]];},
          'width'=>'350px',
    ],
                     [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'serial',
 
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'Ghi Chú', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]],
        'width'=>'250px'
      
    ],
    
          [
         
        'attribute' => 'unit',
 'format' => 'raw',
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
        'value' => function ($data) {
                            return '<span id="bills-unit'.$data->id.'">'.$data->unit.'</span>';
                        },
        'width'=>'50px'
      
    ],
            [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'number',
    'width'=>'50px',
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'Số Lướng', 'size'=>'md','formOptions' => ['action' => ['/suachuathietbi/edititems']]],
         
      
    ],
                  [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'note',
 
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'Ghi Chú', 'size'=>'md','formOptions' => ['action' => ['/suachuathietbi/edititems']]],
        'width'=>'250px'
      
    ],
               
      
            // 'note:ntext',

           ['class'=>'kartik\grid\ActionColumn',
                                            'header' => "Tùy Chọn",
                                            'width'=>'75px',
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
    ]); ?>
        </div>
       <?php }?>
   
  

</div>
</div>