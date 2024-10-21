<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
 
use \kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dntt\models\SearchDntt */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Phiếu ra cổng');
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
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/gatepass'], [
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
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Phiếu ra cổng'],
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
                    [
                        'class' => 'kartik\grid\SerialColumn',
                        'contentOptions' => ['class' => 'kartik-sheet-style'],
                        'width' => '16px',
                        'header' => '#',
                        'headerOptions' => ['class' => 'kartik-sheet-style']
                    ],
                    ['attribute' => 'name',
                        'pageSummary' => 'Tổng Cộng :',
                        'vAlign' => 'middle',
                        'format' => 'raw',
                        'filter' => true,
                        'value' => function ($data) {
                            return Html::a($data->name, ['update?id=' . $data->id]);
                            
                        },
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'Người làm phiếu'
                        ]
                    ],
                    ['attribute' => 'items',
                        'vAlign' => 'middle',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->items, ['update?id=' . $data->id]);
                        },
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'Thiết bị'
                        ]
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
//                                    'groupHeader'=> [0 => 'Total',  8 => GridView::F_SUM ],
                        'pageSummary' => true,
                        'attribute' => 'number',
                        'label' => 'Số Lượng',
                        'format' => ['decimal', 0],
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'số lượng'
                        ]
                    ],
                    'room',
                    ['attribute' => 'created_date',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'format' => 'raw',
                        'width' => '150px',
                        'label' => 'Ngày tạo',
                        'filterWidgetOptions' => [
                            'hideInput' => true,
                            'autoUpdateOnInit' => true,
                            'presetDropdown' => TRUE,
                            'convertFormat' => true,
                            'pluginOptions' => ['autoclose' => true, 'locale' => ['format' => 'd/m/Y', 'separator' => ' To ', "timePicker" => true,
                                    'timePickerIncrement' => 30,], 'opens' => 'right', 'language' => 'VN',
                            ],
//                                'pluginEvents' => [
//                                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('created') }",
//                                ]
                        ],
                    ],
//                           ['attribute' => 'proposal',
//                            'format' => 'raw',
//                            'width' => '100px',
//                            'label' => 'Tờ Trình',
//                         
//                                ],
//            ['attribute' => 'proposal',
//            'filterType' => GridView::FILTER_DATE_RANGE,
//            'format' => 'raw',
//            'width' => '100px',
//            'filterWidgetOptions' => [
// 
//                'presetDropdown' => false,
//                'convertFormat' => true,
//                'pluginOptions' => ['locale' => ['format' => 'd/m/Y', 'separator' => ' To ', " timePicker" => true,
//                        'timePickerIncrement' => 30,], 'opens' => 'right',
//                ],
// 
//            ],
//        ],
//                                     ['class' => 'kartik\grid\DataColumn',
//                                    'pageSummaryFunc' => GridView::F_SUM,
////                                    'groupHeader'=> [0 => 'Total',  8 => GridView::F_SUM ],
//                                  'pageSummary'=>true,
//                                    'attribute' => 'money',
//                                    
//                                    'label' => 'Tổng tiền',
//                                    'format'=>['decimal', 0],
//   'filterInputOptions' => [
//                'class'       => 'form-control',
//                'placeholder' => 'Tổng Tiền'
//             ]
//                                ],
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width' => '200px',
                        'template' => '{view}{print} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {

                                return Html::a('<span class="label label-success">Xem</span>', $url, [
                                            'data-toggle' => "modal", 'title' => 'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                                ]);
                            },
                            'print' => function ($url, $model) {

                                return Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', '#', ['link' => $url, 'class' => 'print', 'target' => '_blank'
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
            ])
            ?>

        </div></div> 
</div>

<?php
Modal::begin(['id' => 'myModal',
    'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
]);
echo "<div id='myModalContent'></div>";

Modal::end();
//
$js = "
$('.print').click(function(){
   window.open($(this).attr('link'), '_blank');
})                
$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
$this->registerJs($js);
?>