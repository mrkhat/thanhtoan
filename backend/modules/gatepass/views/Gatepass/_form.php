<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use backend\modules\room\models\Room;
 use kartik\widgets\Select2;
 
   use yii\web\JsExpression;
   $url2=\yii\helpers\Url::to(['/room/list']);
/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\bills */
/* @var $form yii\widgets\ActiveForm */
 use backend\modules\gatepass\models\Gatepass;
 
use kartik\grid\GridView;
 
$user_role=\Yii::$app->user->identity->role;

$readOnly=($user_role==20||$user_role==30)?false:true;
?>

<div class="row">
 

  <div class="col-md-12">
    <div class="box-body">
           <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="form-group">
   
 
        <?php $name = $model->room?>
         </div>
           <div class="form-group">
 
    </div>
       
         
           <div class="form-group">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'readOnly'=> $readOnly,'value'=>$model->name?$model->name:\Yii::$app->user->identity->first_name]) ?>
   </div>
 
     
        
       
         
   
         <?php if(!$model->isNewRecord){
             $model2=new Gatepass;
             ?>
          <td  class='col-md-2'style="height: 100px">  <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></td>
         <?php ActiveForm::end();
         
             $form = ActiveForm::begin(['action'=>'/gatepass/create','options' => ['enctype' => 'multipart/form-data']]) ?>
               
              <?= $form->field($model2, 'name')->hiddenInput(['maxlength' => true,'value'=>$model->name])->label(false) ?>
              <?= $form->field($model2, 'created_date')->hiddenInput(['maxlength' => true,'value'=>$model->created_date])->label(false) ?>
              <?= $form->field($model2, 'key')->hiddenInput(['maxlength' => true,'value'=>$model->key])->label(false) ?>

        <div class="form-group">
         <table class="col-md-12">
            <tr>
                <td class="col-md-3" style="height: 100px">
 <?= $form->field($model2, 'items')->widget(Select2::classname(), [
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
                            'data' => new JsExpression('function(params) { return {q:params.term,g:1}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { $("#bills-unit").html(device.unit);$("#bills-number").val("1"); return device.name || device.text; }'),
                    ],
                ])->label('Thiết Bị')?> </td>
                
                <td  class='col-md-1'style="height: 100px "id="bills-unit"> </td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model2, 'room')->textInput(["id"=>'bills-serial','maxlength' => true]) ?></td>
                <td  class='col-md-1'style="height: 100px"> <?= $form->field($model2, 'number')->textInput(["id"=>'bills-number','maxlength' => true,'value'=>'0']) ?></td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model2, 'devicekey')->textInput(["id"=>'bills-number','maxlength' => true]) ?></td>
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
 <?= $form->field($model, 'items')->widget(Select2::classname(), [
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
                            'data' => new JsExpression('function(params) { return {q:params.term,g:1}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name; }'),
                        'templateSelection' => new JsExpression('function (device) { $("#bills-unit").html(device.unit);$("#bills-number").val("1"); return device.name || device.text; }'),
                    ],
                ])->label('Thiết Bị')?> </td>
                
                <td  class='col-md-1'style="height: 100px "id="bills-unit"> </td>
                <td  class='col-md-1'style="height: 100px"> <?= $form->field($model, 'number')->textInput(["id"=>'bills-number','maxlength' => true,'value'=>'0']) ?></td>
                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model, 'room')->textInput(["id"=>'bills-serial','maxlength' => true]) ?></td>

                <td  class='col-md-4'style="height: 100px"> <?= $form->field($model, 'devicekey')->textInput(["id"=>'bills-note','maxlength' => true]) ?></td>
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
        'attribute' => 'items',
        'vAlign'=>'model',
                       'value'=>function ($model, $key, $index, $widget) { 
                return $model->items;         
                 }, 
         
        'vAlign'=>'model',
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
                            'data' => new JsExpression('function(params) { return {q:params.term,g:1}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) { return device.name+"|"+device.unit; }'),
                        'templateSelection' => new JsExpression('function (device) {$("#bills-unit'.$key.'").html(device.unit);  return device.name+"|"+device.unit || device.text }'),
            ]],
            'header'=>'Tên Thiết Bị', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]];},
          'width'=>'350px',
    ],
              
//            [
//        'class' => 'kartik\grid\EditableColumn',
//        'attribute' => 'serial',
// 
//        'vAlign'=>'middle',
////        'headerOptions'=>['class'=>'kv-sticky-column'],
////        'contentOptions'=>['class'=>'kv-sticky-column'],
//        'editableOptions'=>['header'=>'Ghi Chú', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]],
//        'width'=>'250px'
//      
//    ],
             
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
        'editableOptions'=>['header'=>'Số Lướng', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]],
         
      
    ],
//                  [
//        'class' => 'kartik\grid\EditableColumn',
//        'attribute' => 'note',
// 
//        'vAlign'=>'middle',
////        'headerOptions'=>['class'=>'kv-sticky-column'],
////        'contentOptions'=>['class'=>'kv-sticky-column'],
//        'editableOptions'=>['header'=>'Ghi Chú', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]],
//        'width'=>'250px'
//      
//    ],
                                [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'devicekey',
        'vAlign'=>'model',
                 
      'value' => function ($data) {
                            return is_array($data->devicekey)?implode(",",$data->devicekey):$data->devicekey;
                        },
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>function ($model, $key, $index, $widget) {return[
        'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
             
            'options' =>  [
                
                   'pluginOptions' => [
                       'multiple'=> true,
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
            'header'=>'Tên Thiết Bị', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]];},
          'width'=>'350px',
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