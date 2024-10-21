<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use common\widgets\GridView;
use backend\modules\customer\models\Customer;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\project\models\SearchProject */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý dự án');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
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
                                   {filters}
                                    <div class='col-md-6'>
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
                    ['attribute' => 'name',
                        'format' => 'raw',
                         'label'=>'Tên dự án',
                        'pageSummary' => 'Tổng Cộng :',
                        'value' => function ($data) {
                            return Html::a($data->name, ['update?id=' . $data->id]);
                        }
                    ],
                    ['attribute' => 'id',
                        'format' => 'raw',
                        
                        'label' => "Mã dự án",
                        'value' => function ($data) {
                            return "#" . $data->id;
                        }
                    ],
                    [
                        'attribute' => 'created',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'format' => 'raw',
                        'width' => '100px',
                        'label'=>'Ngày tạo',
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
                    ['attribute' => 'customer_id',
                        'format' => 'raw',
                        'label' => 'Tên khách hàng',
                        'value' => function ($data) {
                            $customer = Customer::findOne(['id' => $data->customer_id]);
                            return !empty($customer) ? Html::a($customer->name, ['/customer/view?id=' . $data->customer_id], [
                                        'data-toggle' => "modal",'title'=>'Thông tin khách hàng', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    ]) : '';
                        }
                    ],
//             'email:email',
//             'discount',
                    // 'note',
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' =>function($data){
                        $var=0;
                        foreach($data as $item){
                        $var+=   (0+str_replace(",","",explode("</br>", $item)[0]));
                            
                        }
                         return number_format($var);},
                        'attribute' => 'recive',
                         'format'=>'raw',
                        'label' => 'Thu (Vnđ)',
                        'pageSummary' => true,
                         'value'=>function($data){
                        $view=($data->recive)?Html::a('Xem', ['/recive/project?id=' . $data->id], ['data-toggle' => "modal",'title'=>$data->name, 'data-target' => "#myModal", 'class' => 'modelshow',]):"";
                        return number_format($data->recive)."</br>(".round((($data->money)?($data->recive/$data->money):0)*100,1)." %)".$view;
                        },
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                         'pageSummaryFunc' =>function($data){
                        $var=0;
                        foreach($data as $item){
                        $var+=   (0+str_replace(",","",explode("</br>", $item)[0]));
                            
                        }
                        return number_format($var);},
                        'attribute' => 'payment',
                         'format'=>'raw',
                        'label' => 'Chi (Vnđ)',
                        'pageSummary' => true,
                     'value'=>function($data){
                        $view=($data->payment)?Html::a('Xem', ['/payment/project?id=' . $data->id], ['data-toggle' => "modal",'title'=>$data->name, 'data-target' => "#myModal", 'class' => 'modelshow',]):"";
                        return number_format($data->payment)."</br>".$view;
                       
                        },
                    
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                        'attribute' => 'money',
                          'contentOptions'=>['style'=>'font-weight: bold;'],
                        'label' => 'Tổng tiền',
                        'pageSummary' => true,
                       'format'=>['decimal', 0],
                        'value'=>function($data){
                        return $data->money +0 ;
                        },
                    ],
                    [
                        'class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                          'contentOptions'=>['style'=>'font-weight: bold;'],
                        'label' => 'Còn lại',
                        'pageSummary' => true,
                        'format'=>['decimal', 0],
                        'value' => function ($data) {
                            return $data->money - $data->recive;
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
                        'value' => function ($data) {
                            return $data->status == 1 ? "<span class='text-green'>Đã hoàn thành</span>" : "Đang thực hiện";
                        }
                        ,
	    		'filter'=>   Html::activeDropDownList($searchModel, 'status', [1=>'Đã hoàn thành',0=>'Đang thực hiện'],['class'=>'form-control','prompt' => 'Trạng thái']),
//                        'filter' => [1 => 'Đã hoàn thành', 0 => 'Đang thực hiện'],
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                    ],
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width'=>'150px',
                        'template' => '{view} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {

                                return Html::a('<span class="label label-success">Xem</span>', [$url], [
                                            'data-toggle' => "modal",'title'=>'Thông tin dự án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    
                                ]);
                            },
                            'delete' => function ($url, $model) {

                                return Html::a('<span class="label label-danger">Xóa</span>', $url, ['title' => "Delete",
                                            'data-confirm' => 'Bạn có chắc muốn xóa dự án này?',
                                            'data-method' => "post",
                                            'data-pjax' => "0"]);
                            }
                        ],
                    ],
                ],
            ]);
            ?>

        </div></div> 

</div>
<?php }else{?>

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
                                   {filters}
                                    <div class='col-md-6'>
                                    {toggleData}
                                         </div></div>
                                    </div>
                                    <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']], 'showPageSummary' => false,
                'columns' => [
                    [
                        'class' => 'kartik\grid\SerialColumn',
                        'contentOptions' => ['class' => 'kartik-sheet-style'],
                        'width' => '16px',
                        'header' => '#',
                        'headerOptions' => ['class' => 'kartik-sheet-style']
                    ],
                    ['attribute' => 'name',
                        'format' => 'raw',
                         'label'=>'Tên dự án',
                        'pageSummary' => 'Tổng Cộng :',
                        'value' => function ($data) {
                            return Html::a($data->name, ['update?id=' . $data->id]);
                        }
                    ],
                    ['attribute' => 'id',
                        'format' => 'raw',
                        
                        'label' => "Mã dự án",
                        'value' => function ($data) {
                            return "#" . $data->id;
                        }
                    ],
                    [
                        'attribute' => 'created',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'format' => 'raw',
                        'width' => '100px',
                        'label'=>'Ngày tạo',
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
                    ['attribute' => 'customer_id',
                        'format' => 'raw',
                        'label' => 'Tên khách hàng',
                        'value' => function ($data) {
                            $customer = Customer::findOne(['id' => $data->customer_id]);
                            return !empty($customer) ? Html::a($customer->name, ['/customer/view?id=' . $data->customer_id], [
                                        'data-toggle' => "modal",'title'=>'Thông tin khách hàng', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    ]) : '';
                        }
                    ],
//             'email:email',
//             'discount',
                    // 'note',
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                        'attribute' => 'recive',
                       
                        'label' => 'Thu (Vnđ)',
                        'pageSummary' => true,
                      'format'=>['decimal', 0],
                         'value'=>function($data){
                        return (int) $data->recive +0;
                        },
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                        'attribute' => 'payment',
                          'value'=>function($data){
                        return (int) $data->payment +0 ;
                        },
                        'label' => 'Chi (Vnđ)',
                        'pageSummary' => true,
                        'format'=>['decimal', 0],
                    ],
                    ['class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                        'attribute' => 'money',
                       'contentOptions'=>['style'=>'font-weight: bold;'],
                        'label' => 'Tổng tiền',
                        'pageSummary' => true,
                       'format'=>['decimal', 0],
                           'value'=>function($data){
                        return $data->money +0 ;
                        },
                    ],
                    [
                        'class' => 'kartik\grid\DataColumn',
                        'pageSummaryFunc' => GridView::F_SUM,
                        'contentOptions'=>['style'=>'font-weight: bold;'],
                        'label' => 'Còn lại',
                        'pageSummary' => true,
                        'format'=>['decimal', 0],
                        'value' => function ($data) {
                            return $data->money - $data->recive;
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
                        'value' => function ($data) {
                            return $data->status == 1 ? "<span class='text-green'>Đã hoàn thành</span>" : "Đang thực hiện";
                        }
                        ,
	    		'filter'=>   Html::activeDropDownList($searchModel, 'status', [1=>'Đã hoàn thành',0=>'Đang thực hiện'],['class'=>'form-control','prompt' => 'Trạng thái']),
//                        'filter' => [1 => 'Đã hoàn thành', 0 => 'Đang thực hiện'],
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                    ],
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width'=>'150px',
                        'template' => '{view} ',
                        'buttons' => [
                            'view' => function ($url, $model) {

                                return Html::a('<span class="label label-success">Xem</span>', [$url], [
                                            'data-toggle' => "modal",'title'=>'Thông tin dự án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    
                                ]);
                            },
                             
                        ],
                    ],
                ],
            ]);
            ?>

        </div></div> 

</div>
<?php } ?>
            <?php
            Modal::begin(['id' => 'myModal',
                 'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
                'size'=>'modal-lg'
            ]);
            echo "<div id='myModalContent'></div>";

            Modal::end();
//
            $js = "$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
            $this->registerJs($js);
            ?>
