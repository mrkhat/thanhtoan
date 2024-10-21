<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use common\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dntt\models\SearchDntt */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Quản lý mua sắm');
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
   
                'layout' => " <div class='box-header'>
                                <div id='w0-filters' class='row filters skip-export'>
                                  <div class='col-md-9'>  {filters} </div>
                                    <div class='col-md-2'>
                                    {toggleData}
                                        <div class='box-tools pull-right'>
                                            <div class='input-group'>" .
                Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) . "   
                                           </div>
                  </div></div></div>
                                    </div>
                                    <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']], 'showPageSummary' => true,
                'columns' => [
                    [
                        'class' => 'kartik\grid\SerialColumn',
                        'contentOptions' => ['class' => 'kartik-sheet-style'],
                        'width' => '16px',
                        'header' => '#',
                        'headerOptions' => ['class' => 'kartik-sheet-style']
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                        'attribute' => 'name',
                        'pageSummary' => 'Tổng Cộng :',
                        'vAlign' => 'middle',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->name, ['update?id=' . $data->id]);
                        },
                                'filterInputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nội dung thanh toán'
                                ]
                            ], ['class' => 'kartik\grid\DataColumn',
                                'attribute' => 'company',
                                'vAlign' => 'middle',
                                'width' => '150px',
                                'filterInputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Tên Công Ty'
                                ]
                            ],
                            ['class' => 'kartik\grid\DataColumn',
                                'attribute' => 'date_of_payment',
                                'filterType' => GridView::FILTER_DATE_RANGE,
                                'format' => 'raw',
                                'width' => '150px',
                                'label' => 'Ngày Thanh Toán',
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
                            ['class' => 'kartik\grid\DataColumn',
                                'attribute' => 'proposal',
                                'format' => 'raw',
                                'width' => '100px',
                                'label' => 'Tờ Trình',
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Tờ Trình',
                                ]
                            ],

                            ['class' => 'kartik\grid\DataColumn',
                                'filterType'=> \yii\widgets\MaskedInput::className(),
                                'pageSummaryFunc' => GridView::F_SUM,
//                                    'groupHeader'=> [0 => 'Total',  8 => GridView::F_SUM ],
                                'pageSummary' => true,
                                'attribute' => 'money',
                                'label' => 'Tổng tiền',
                                'format' => ['decimal', 0],
                                
                                
                                'filterWidgetOptions' => [
                                    'clientOptions' => [ 'alias' => 'decimal','groupSeparator' => ',','autoGroup' => true,'removeMaskOnSubmit' => true,]
//                               
                                ],
//                                       'format'=>['decimalSeparator', ','],                 
                                'filterInputOptions' => [
                                    
                                    
                                    
                                    'class' => 'form-control',
                                    'placeholder' => 'Tổng Tiền',
                                    
                                ]
                            ],
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