<?php

use yii\helpers\Html;
//use common\widgets\GridView;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\helpers\Url;
use backend\modules\room\models\Room;
use common\components\Utils;
$url2 = \yii\helpers\Url::to(['/room/list']);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\bills\models\SearchItems */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản Lý Phiếu Bàn Giao Thiết Bị';
$this->params['breadcrumbs'][] = $this->title;

$roomname = empty(Yii::$app->request->queryParams['SearchBgtb']['roomid']) ? '' : Room::findOne(Yii::$app->request->queryParams['SearchBgtb']['roomid'])->name;
?>
<div class="row">
    <div class="col-xs-12">

        <div class="box">
<?php         $user_role=\Yii::$app->user->identity->role;?>
            <?php if($user_role>10){ ?>
            <?=
 
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'filterPosition' => GridView::FILTER_POS_HEADER,
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
                'showPageSummary' => true,
                'export' => [
                    'fontAwesome' => true,
                    'showConfirmAlert' => false,
                    'target' => GridView::TARGET_BLANK
                ],
                'exportConfig' => [
                    GridView::EXCEL => ['label' => 'Excel'],
                ],
                'toolbar' => [
                    [
                        'content' =>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                            'type' => 'button',
                            'title' => Yii::t('app', 'Thêm Mới'),
                            'class' => 'btn btn-success'
                        ]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/bgtb'], [
                            'class' => 'btn btn-default',
                            'title' => Yii::t('app', 'Làm mới')
                        ]),
                    ],
                    '{toggleData}',
                    '{export}',
                ],
                'pjax' => true,
                'striped' => true,
                'hover' => true,
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Phiếu Bàn Giao Thiết Bị'],
//        'pjax' => true,
//            'responsive' => true,
//            'pjaxSettings' => [
//                'options' => [
//                    'enablePushState' => false,
//                    'options' => ['id' => 'unique-pjax-id'] // UNIQUE PJAX CONTAINER ID
//                ],
//
//            ],
                'columns' => [
                    ['attribute' => 'key',
                        'width' => '50px',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->key, ['update?id=' . $data->key]);
                        }, 'group' => true,
                    ],
//            'type',
                    ['attribute' => 'item', 'format' => 'raw', 'width' => '300px',],
                    ['attribute' => 'unit', 'width' => '50px',
                    ],
                    ['attribute' => 'number', 'width' => '50px',
                        'pageSummary' => true],
                    // 'serial',
                    ['attribute' => 'roomid',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->roomname;
                        },
                        'group' => true,
                        'subGroupOf' => 1,
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'hideSearch' => true,
                            'initValueText' => $roomname,
                            'pluginOptions' => [
                                'placeholder' => 'Search for a Room ...',
                                'allowClear' => true,
                                'minimumInputLength' => 2,
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
                                'templateResult' => new JsExpression('function(device) {return device.name || device.text;}'),
                                'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                            ],
                        ],
                    ],
                    // 'note:ntext',
                    ['attribute' => 'deliver',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
                    ['attribute' => 'receiver',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
                    // 'receiver',
                    // 'created_date'
                    ['attribute' => 'display_date',
                        'width' => '250px',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'group' => true,
                        'subGroupOf' => 0,
                        'filterWidgetOptions' => [
                            'hideInput' => true,
                            'autoUpdateOnInit' => true,
                            'presetDropdown' => TRUE,
                            'convertFormat' => true,
                            'pluginOptions' => ['locale' => ['format' => 'd/m/Y', 'separator' => ' To ', " timePicker" => true,
                                    'timePickerIncrement' => 30,], 'opens' => 'right',
                            ],
//                'pluginEvents' => [
//                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
//                ]
                        ],
                    ],
                                
                    ['class' => 'kartik\grid\EditableColumn',
                        'group' => true,
                         'subGroupOf' => 0,
                        'attribute' => 'status',
                        'format' => 'raw',
                        'vAlign' => 'middle',
                     
                        
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                        
                          'editableOptions'=>function ($model, $key, $index, $widget) {return[
        'inputType' => \kartik\editable\Editable::INPUT_SWITCH,
             
            'options' =>  [
                   'pluginOptions' => [   'size' => 'small',
        'onColor' => 'success',
        'offColor' => 'danger',
         'onText'=>'Yes',
        'offText'=>'No' ]], 'asPopover' => false,
                              
                               'inlineSettings' => [
        'templateBefore' => \kartik\editable\Editable::INLINE_BEFORE_1, 
        'templateAfter' =>  \kartik\editable\Editable::INLINE_AFTER_1
    ],
            'header'=>'', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]];},
                        
                           'width' => '250px',
                 'value' => function ($data) {
                   $t= '<span class="btn btn-success" style="width: 36px;">Yes</span>';
                   $n=  '<span class="btn btn-danger" style="width: 36px;">No</span>';
                return $data->status?$t:$n;
                 }
                    ],
                ['class' => 'kartik\grid\EditableColumn',
                        'group' => true,
                         'subGroupOf' => 0,
                        'attribute' => 'status1',
                        'format' => 'raw',
                        'vAlign' => 'middle',
                     
                        
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
                        
                          'editableOptions'=>function ($model, $key, $index, $widget) {return[
        'inputType' => \kartik\editable\Editable::INPUT_SWITCH,
             
            'options' =>  [
                   'pluginOptions' => [   'size' => 'small',
        'onColor' => 'success',
        'offColor' => 'danger',
         'onText'=>'Yes',
        'offText'=>'No' ]], 'asPopover' => false,
                              
                               'inlineSettings' => [
        'templateBefore' => \kartik\editable\Editable::INLINE_BEFORE_1, 
        'templateAfter' =>  \kartik\editable\Editable::INLINE_AFTER_1
    ],
            'header'=>'', 'size'=>'md','formOptions' => ['action' => ['/bgtb/edititems']]];},
                        
                           'width' => '250px',
                 'value' => function ($data) {
                   $t= '<span class="btn btn-success" style="width: 36px;">Yes</span>';
                   $n=  '<span class="btn btn-danger" style="width: 36px;">No</span>';
                return $data->status1?$t:$n;
                 }
                    ],
                    // 'status',
                    // 'status1',
                    // 'status2',
                    // 'unit',
                    // 'note2',
                    // 'source',
                    [ 
                        'width' => '300px',
                        'format' => 'raw',
                        'label' => 'Tùy chọn',
                        'filter' => false,
                        'group' => true,
                        'subGroupOf' => 0,
                        'value' => function ($data) {
                            $view = Html::a('<span class="label label-success">Xem</span>', Url::to(['view', 'id' => $data->key]), [
                                        'data-toggle' => "modal", 'title' => 'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                            ]);
                            $file = file_exists("data/images/bgtb/$data->key.jpg")? Html::a('<span class="fa fa-x2 fa-file-pdf-o label-danger">File</span>', Utils::loadImage('bgtb/'.$data->key.'.jpg'), [
                                        'data-toggle' => "modal", 'title' => 'File Scan', "modal", 'data-target' => "#myModal", 'class' => 'modelshowfile',
                            ]):"";
                            $update = Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update', 'id' => $data->key]));
                            $print = Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', Url::to(['print', 'id' => $data->key]), ['link' => Url::to(['print', 'id' => $data->key]), 'class' => 'print', 'target' => '_blank'
                            ]);
                            $role = \Yii::$app->user->identity->role;
                            $d = $role > 10 ? $file. $view . $update . $print : ($data->status == 1 ? $file.$view . $print : $file.$view . $update . $print);
                            return $d;
                        }
                    ],
                ],
            ]);
              } else { ?><?=
                 GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'filterPosition' => GridView::FILTER_POS_HEADER,
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
                'showPageSummary' => true,
                'export' => [
                    'fontAwesome' => true,
                    'showConfirmAlert' => false,
                    'target' => GridView::TARGET_BLANK
                ],
                'exportConfig' => [
                    GridView::EXCEL => ['label' => 'Excel'],
                ],
                'toolbar' => [
                    [
                        'content' =>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                            'type' => 'button',
                            'title' => Yii::t('app', 'Thêm Mới'),
                            'class' => 'btn btn-success'
                        ]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/bgtb'], [
                            'class' => 'btn btn-default',
                            'title' => Yii::t('app', 'Làm mới')
                        ]),
                    ],
                    '{toggleData}',
                    '{export}',
                ],
                'pjax' => true,
                'striped' => true,
                'hover' => true,
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Phiếu Bàn Giao Thiết Bị'],
//        'pjax' => true,
//            'responsive' => true,
//            'pjaxSettings' => [
//                'options' => [
//                    'enablePushState' => false,
//                    'options' => ['id' => 'unique-pjax-id'] // UNIQUE PJAX CONTAINER ID
//                ],
//
//            ],
                'columns' => [
                    ['attribute' => 'key',
                        'width' => '50px',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->key, ['update?id=' . $data->key]);
                        }, 'group' => true,
                    ],
//            'type',
                    ['attribute' => 'item', 'format' => 'raw', 'width' => '300px',],
                    ['attribute' => 'unit', 'width' => '50px',
                    ],
                    ['attribute' => 'number', 'width' => '50px',
                        'pageSummary' => true],
                    // 'serial',
                    ['attribute' => 'roomid',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->roomname;
                        },
                        'group' => true,
                        'subGroupOf' => 1,
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'hideSearch' => true,
                            'initValueText' => $roomname,
                            'pluginOptions' => [
                                'placeholder' => 'Search for a Room ...',
                                'allowClear' => true,
                                'minimumInputLength' => 2,
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
                                'templateResult' => new JsExpression('function(device) {return device.name || device.text;}'),
                                'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                            ],
                        ],
                    ],
                    // 'note:ntext',
                    ['attribute' => 'deliver',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
                    ['attribute' => 'receiver',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
                    // 'receiver',
                    // 'created_date'
                    ['attribute' => 'display_date',
                        'width' => '250px',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'group' => true,
                        'subGroupOf' => 0,
                        'filterWidgetOptions' => [
                            'hideInput' => true,
                            'autoUpdateOnInit' => true,
                            'presetDropdown' => TRUE,
                            'convertFormat' => true,
                            'pluginOptions' => ['locale' => ['format' => 'd/m/Y', 'separator' => ' To ', " timePicker" => true,
                                    'timePickerIncrement' => 30,], 'opens' => 'right',
                            ],
//                'pluginEvents' => [
//                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
//                ]
                        ],
                    ],
                                
                  
                   ['attribute' => 'status', 'format' => 'raw', 'width' => '300px',
                         'value' => function ($data) {
                   $t= '<span class="btn btn-success" style="width: 36px;">Yes</span>';
                   $n=  '<span class="btn btn-danger" style="width: 36px;">No</span>';
                return $data->status?$t:$n;
                 }
                       ],
                   
                    // 'status1',
                    // 'status2',
                    // 'unit',
                    // 'note2',
                    // 'source',
                    [ 
                        'width' => '300px',
                        'format' => 'raw',
                        'label' => 'Tùy chọn',
                        'filter' => false,
                        'group' => true,
                        'subGroupOf' => 0,
                        'value' => function ($data) {
                            $view = Html::a('<span class="label label-success">Xem</span>', Url::to(['view', 'id' => $data->key]), [
                                        'data-toggle' => "modal", 'title' => 'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                            ]);
                            $file = file_exists("data/images/bgtb/$data->key.jpg")? Html::a('<span class="fa fa-x2 fa-file-pdf-o label-danger">File</span>', Utils::loadImage('bgtb/'.$data->key.'.jpg'), [
                                        'data-toggle' => "modal", 'title' => 'File Scan', "modal", 'data-target' => "#myModal", 'class' => 'modelshowfile',
                            ]):"";
                            $update = Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update', 'id' => $data->key]));
                            $print = Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', Url::to(['print', 'id' => $data->key]), ['link' => Url::to(['print', 'id' => $data->key]), 'class' => 'print', 'target' => '_blank'
                            ]);
                            $role = \Yii::$app->user->identity->role;
                            $d = $role > 10 ? $file.$view . $update . $print : ($data->status == 1 ? $file.$view . $print : $file.$view . $update . $print);
                            return $d;
                        }
                    ],
                ],
            ]);
                ?>
          <?php  }?>
        </div></div> 
</div>
            <?php
            Modal::begin(['id' => 'myModal', 'size' => 'modal-lg',
                'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
            ]);
            echo "<div id='myModalContent'></div>";

            Modal::end();
//

            $js = " 
$('.print').click(function(){
    var url= $(this).attr('link') ;
   window.location.href=url;
})                
$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});
$('.modelshowfile').click(function(){
 
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').html(\"<img width=100% src=\"+$(this).attr('href')+\">\");
});
";
            $this->registerJs($js);
            