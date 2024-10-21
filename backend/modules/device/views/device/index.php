<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use \kartik\grid\GridView;
use backend\modules\device\models\Device;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;

$url2 = \yii\helpers\Url::to(['/room/list']);
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\device\models\SearchDevice */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản Lý Thiết Bị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">

        <div class="box">

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'filterPosition' => GridView::FILTER_POS_HEADER,
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
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
                         \Yii::$app->user->identity->role >10 ? Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                            'type' => 'button',
                            'title' => Yii::t('app', 'Thêm Mới'),
                            'class' => 'btn btn-success'
                        ])." " .Html::a(' <i class="glyphicon glyphicon-repeat"> </i>', ['updateld'], [
                            'class' => 'btn btn-warning',
                            'title' => Yii::t('app', 'Làm mới')
                        ]) :"" . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/device'], [
                            'class' => 'btn btn-default',
                            'title' => Yii::t('app', 'Làm mới')
                        ]),
                    ],
                    '{toggleData}',
                    '{export}',
                ],
//                'pjax' => true,
//                'striped' => true,
                'hover' => true,
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Thiết Bị'],
                'columns' => [


                    ['attribute' => 'id'],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'type',
                        'vAlign' => 'middle',
                        'headerOptions' => ['class' => 'kv-sticky-column'],
                        'contentOptions' => ['class' => 'kv-sticky-column'],
                        'editableOptions' => ['header' => 'Mã Thiết Bị', 'size' => 'md', 'formOptions' => ['action' => ['/device/editdevice']]],
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter' => ArrayHelper::map(Device::find()->orderBy('type')->asArray()->all(), 'type', 'type'),
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                        'filterInputOptions' => ['placeholder' => 'Thiết bị'],
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'key',
                        'vAlign' => 'middle',
                        'headerOptions' => ['class' => 'kv-sticky-column'],
                        'contentOptions' => ['class' => 'kv-sticky-column'],
                        'editableOptions' => ['header' => 'Mã Thiết Bị', 'size' => 'md', 'formOptions' => ['action' => ['/device/editdevice']]],
                        'width' => '150px'
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'model',
                        'vAlign' => 'model',
                        'headerOptions' => ['class' => 'kv-sticky-column'],
                        'contentOptions' => ['class' => 'kv-sticky-column'],
                        'editableOptions' => ['header' => 'Mã Thiết Bị', 'size' => 'md', 'formOptions' => ['action' => ['/device/editdevice']]],
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter' => ArrayHelper::map(Device::find()->orderBy('model')->asArray()->all(), 'model', 'model'),
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                        'filterInputOptions' => ['placeholder' => 'Thiết bị'],
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'serrial',
                        'width' => '200px',
                        'vAlign' => 'model',
                        'headerOptions' => ['class' => 'kv-sticky-column'],
                        'contentOptions' => ['class' => 'kv-sticky-column'],
                        'editableOptions' => ['header' => 'Mã Thiết Bị', 'size' => 'md', 'formOptions' => ['action' => ['/device/editdevice']]],
                    ],
                    'user',
                    ['attribute' => 'departments',
                        'value' => function ($model, $key, $index, $widget) {
                            return $model->departments;
                        },
                        'group' => true,
                        'subGroupOf' => 1,
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'hideSearch' => true,
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
                                    'data' => new JsExpression('function(params) {  return {q:params.term,id:null,c:"1"}; }'),
                                ],
                                'escapeMarkup' => new JsExpression('function (markup) {return markup; }'),
                                'templateResult' => new JsExpression('function(device) {return device.name || device.text;}'),
                                'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                            ],
                        ],
                    ],
                    'lever',
                                'room_name',
                
                            \Yii::$app->user->identity->role > 20 ? ['attribute' => 'price',   'format' => 'Decimal',]:['label'=>'price']
                            ,['attribute' => 'nhacungcap', 'format' => 'raw',],
                            'location_note',        
              
                    // 'note:ntext',
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width' => '200px',
                        'template' => \Yii::$app->user->identity->role > 20 ? '{history}{view}{print}{Coppy}{delete}' :(\Yii::$app->user->identity->role > 10?"{history}{view}{update}":'{history}{view}'),
                        'buttons' => [
                            'history' => function ($url, $model) {

                                return Html::a('<span class="label label-success">History</span>', '/device/history?name=' . $model->name, [
                                            'data-toggle' => "modal", 'title' => 'Lịch Sử Máy', "modal", 'data-target' => "#history", 'class' => 'history',
                                ]);
                            },'update' => function ($url, $model) {

                                return Html::a('<span class="label label-warning">update</span>', $url, [
                                            'data-toggle' => "modal", 'title' => 'Update Thông tin thiết bị', "modal", 
                                ]);
                            },
                                    'view' => function ($url, $model) {

                                return Html::a('<span class="label label-success">Xem</span>', $url, [
                                            'data-toggle' => "modal", 'title' => 'Thông tin thiết bị', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                                ]);
                            }, 'Coppy' => function ($url, $model) {

                                return Html::a('<span class="label label-warning"> Coppy </span>', '/device/coppy?id=' . $model->id, [
                                ]);
                            },
                                    'print' => function ($url, $model) {

                                return Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', '#', [ 'link' => $url, 'class' => 'print', 'target' => '_blank'
                                ]);
                            },
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
            </div></div>
                    <?php
                    Modal::begin(['id' => 'history', 'size' => 'modal-lg',
                        'header' => ' <h4 class="modal-title" id="history-tile"></h4>',
                    ]);
                    echo "<div id='historyContent'></div>";

                    Modal::end();
//
                    Modal::begin(['id' => 'myModal', 'size' => 'modal-lg',
                        'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
                    ]);
                    echo "<div id='myModalContent'></div>";

                    Modal::end();
                    $js = "
$('.print').click(function(){
   window.open($(this).attr('link'), '_blank');
})
$('.history').click(function(){
     $('#history-tile').html($(this).attr('title'));
    $('#history').find('#historyContent').load($(this).attr('href'));
});
$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
                    $this->registerJs($js);
                    ?>