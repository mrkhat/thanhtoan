<?php
use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use common\widgets\GridView;
use common\components\Utils;
use yii\bootstrap\Modal;
use backend\modules\project\models\Project;
use backend\modules\users\models\Users;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\recive\models\SearchRecive */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý thu');
$this->params['breadcrumbs'][] = $this->title;
 
?>
<?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?>
  <section class="content">
                <div class="row">
                    <div class="col-xs-12">
   <div class="box box-primary">
         
      <?= GridView::widget([
     'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'filterPosition' => GridView::FILTER_POS_HEADER,
                    'layout' => "<div class='box-header'>
                                <div id='w0-filters' class='row filters skip-export'>
                                   {filters}                                  <div class='col-md-9'>
                                         {toggleData}
                                        <div class='box-tools pull-right'>
                                            <div class='input-group'>" .
                    Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) . "   
                                           </div>
                  </div></div></div>
                                    </div>
            <div class='box-body table-responsive no-padding'>
            
                        {items}</div> <div class='box-footer clearfix'>
                       
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
//          'responsive'=>true,
//    'hover'=>true,
                    'pjax' => true,
                    'pjaxSettings' => [
//        'neverTimeout'=>true,
//        'beforeGrid'=>'My fancy content before.',
//        'afterGrid'=>'My fancy content after.',
                    ],
//          'panel'=>[
//        'type'=>GridView::TYPE_PRIMARY,
//        'heading'=>"sss",
//    ],
           'showPageSummary'=>true,
            
                    'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
                    'columns' => [
                   [
    'class'=>'kartik\grid\SerialColumn',
    'contentOptions'=>['class'=>'kartik-sheet-style'],
    'width'=>'16px',
    'header'=>'#',
    'headerOptions'=>['class'=>'kartik-sheet-style']
],
                        ['attribute'=>'name',
    'pageSummary'=>'Tổng Cộng :',
    'vAlign'=>'middle',
                             'format' => 'raw',
             'value' => function ($data) {
             return Html::a($data->name,['update?id='.$data->id]); }
                            
                            ]  ,
                        [

                            'attribute' => 'created',
                            
                            'filterType' => GridView::FILTER_DATE_RANGE,
                            'format' => 'raw',
                            'width' => '100px',
                            'filterWidgetOptions' => [
                                'hideInput' => true,
                                'autoUpdateOnInit' => true,
                                'presetDropdown' => TRUE,
                                'convertFormat' => true,
                                'pluginOptions' => [ 'locale' => ['format' => 'd/m/Y', 'separator' => ' To ', " timePicker" => true,
                                        'timePickerIncrement' => 30,], 'opens' => 'right', 'language' => 'VN',
                                ],
                                'pluginEvents' => [
                                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
                                ]
                            ],
                        ],
                        ['attribute' => 'project_id',
                            'format' => 'raw',
                            'width' => '100px',
                            'label' => 'Tên dự án',
                            'value' => function ($data) {
                            
                                return  Html::a($data->project, ['/project/view?id=' . $data->project_id], [
                                            'data-toggle' => "modal",'title'=>'Thông Tin Dự Án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                        ]) ;
                            }
                                ],
                            
                                        ['attribute' => 'receiver',
                                    'format' => 'raw',
                                    'label' => 'Người thu',
                                   
                                
                                    'value' => function ($data) {
                                     
                                        return $data->receiver;
                                    }
                                        ],['attribute' => 'deliver',
                                    'format' => 'raw',
                                    'label' => 'Nhận từ',],
                                       
                                        // 'project_id',
                                        // 'note',
                                        // 'attach',
                                        // 'created',
                                                    ['class' => 'kartik\grid\DataColumn',
                                    'pageSummaryFunc' => GridView::F_SUM,
//                                    'groupHeader'=> [0 => 'Total',  8 => GridView::F_SUM ],
                          'pageSummary'=>true,
                                    'attribute' => 'money',
                                    
                                    'label' => 'Tổng tiền',
                                    'format'=>['decimal', 0],
 
                                ],
                                        ['class'=>'kartik\grid\ActionColumn',
                                            'header' => "Tùy Chọn",
                                            'template' => '{view} {delete}',
                                            'buttons' => [

                                                'view' => function ($url, $model) {

                                                    return Html::a('<span class="label label-success">Xem</span>', $url, [
                                                                'data-toggle' => "modal",'title'=>'Thông Tin Phiếu Chi', 'data-target' => "#myModal", 'class' => 'modelshow',
                                                    ]);
                                                },
                                                        'delete' => function ($url, $model) {

                                                    return Html::a('<span class="label label-danger">Xóa</span>', $url, ['title' => "Delete",
                                                                'data-confirm' => 'Bạn có chắc muốn phiếu chi này?',
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
          </section>
<?php }else{?>

  <section class="content">
                <div class="row">
                    <div class="col-xs-12">
   <div class="box box-primary">
         
      <?= GridView::widget([
     'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'filterPosition' => GridView::FILTER_POS_HEADER,
                    'layout' => "<div class='box-header'>
                                <div id='w0-filters' class='row filters skip-export'>
                                   {filters}                                  <div class='col-md-9'>
                                         {toggleData}
                                        <div class='box-tools pull-right'>
                                            <div class='input-group'>" .
                    Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) . "   
                                           </div>
                  </div></div></div>
                                    </div>
            <div class='box-body table-responsive no-padding'>
            
                        {items}</div> <div class='box-footer clearfix'>
                       
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
//          'responsive'=>true,
    
                    'pjax' => true,
                    'pjaxSettings' => [
 
                    ],
 
//    ],
           'showPageSummary'=>false,
            
                    'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
                    'columns' => [
                   [
    'class'=>'kartik\grid\SerialColumn',
    'contentOptions'=>['class'=>'kartik-sheet-style'],
    'width'=>'16px',
    'header'=>'#',
    'headerOptions'=>['class'=>'kartik-sheet-style']
],
                        ['attribute'=>'name',
    'pageSummary'=>'Tổng Cộng :',
    'vAlign'=>'middle',
                             'format' => 'raw',
             'value' => function ($data) {
             return Html::a($data->name,['update?id='.$data->id]); }
                            
                            ]  ,
                        [

                            'attribute' => 'created',
                            
                            'filterType' => GridView::FILTER_DATE_RANGE,
                            'format' => 'raw',
                            'width' => '100px',
                            'filterWidgetOptions' => [
                                'hideInput' => true,
                                'autoUpdateOnInit' => true,
                                'presetDropdown' => TRUE,
                                'convertFormat' => true,
                                'pluginOptions' => [ 'locale' => ['format' => 'd/m/Y', 'separator' => ' To ', " timePicker" => true,
                                        'timePickerIncrement' => 30,], 'opens' => 'right', 'language' => 'VN',
                                ],
                                'pluginEvents' => [
                                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
                                ]
                            ],
                        ],
                        ['attribute' => 'project_id',
                            'format' => 'raw',
                            'width' => '100px',
                            'label' => 'Tên dự án',
                            'value' => function ($data) {
                            
                                return  Html::a($data->project, ['/project/view?id=' . $data->project_id], [
                                            'data-toggle' => "modal",'title'=>'Thông Tin Dự Án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                        ]) ;
                            }
                                ],
                            
                                        ['attribute' => 'receiver',
                                    'format' => 'raw',
                                    'label' => 'Người thu',
                                   
                                
                                    'value' => function ($data) {
                                     
                                        return $data->receiver;
                                    }
                                        ],['attribute' => 'deliver',
                                    'format' => 'raw',
                                    'label' => 'Nhận từ',],
                                       
                                     
                                                    ['class' => 'kartik\grid\DataColumn',
                                    'pageSummaryFunc' => GridView::F_SUM,
//                                    'groupHeader'=> [0 => 'Total',  8 => GridView::F_SUM ],
                          'pageSummary'=>true,
                                    'attribute' => 'money',
                                    
                                    'label' => 'Tổng tiền',
                                    'format'=>['decimal', 0],
 
                                ],
                                        ['class'=>'kartik\grid\ActionColumn',
                                            'header' => "Tùy Chọn",
                                            'template' => '{view}',
                                            'buttons' => [

                                                'view' => function ($url, $model) {

                                                    return Html::a('<span class="label label-success">Xem</span>', $url, [
                                                                'data-toggle' => "modal",'title'=>'Thông Tin Phiếu Chi', 'data-target' => "#myModal", 'class' => 'modelshow',
                                                    ]);
                                                },
                                                        'delete' => function ($url, $model) {

                                                    return Html::a('<span class="label label-danger">Xóa</span>', $url, ['title' => "Delete",
                                                                'data-confirm' => 'Bạn có chắc muốn phiếu chi này?',
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
          </section>
<?php }?>
            <?php
            Modal::begin(['id' => 'myModal',
                 'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
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
