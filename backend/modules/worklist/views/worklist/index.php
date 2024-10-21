<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Utils;
use yii\bootstrap\Modal;
 use backend\modules\users\models\Users;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\Worklist\models\SearchWorkList */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý công việc';
$this->params['breadcrumbs'][] = $this->title;
?>
 <?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?>
          <div class="row">
            <div class="col-xs-12">
            
    <div class="box box-primary">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách công việc</h3>
                  <div class="box-tools">
                    <div class="input-group">
                    
                      	  <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ?>
                       
                    </div>
                  </div>
                </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       
        'layout'=>"   <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'pager'=>['options'=>['class'=>'pagination pagination-sm no-margin pull-right']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             ['attribute' => 'name',
            'format' => 'raw',
             'value' => function ($data) {
             return Html::a($data->name,['update?id='.$data->id]); }
        ],
           ['attribute' => 'first_name',
                                    'format' => 'raw',
                                    
                                   'label'=>'Người giao',
                                
                                    
                                        ],
            [ 
                'attribute' => 'created',
            'filterType' => GridView::FILTER_DATE_RANGE,
            'format' => 'raw',
            'width' => '250px',
                'value' => function ($data) {
            return $data->created;
                },
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
   ['class'=>'kartik\grid\BooleanColumn',
                'vAlign'=>'middle',
                        'attribute' => 'urgent',
                        'format' => 'raw',
                        'label' => 'Tình trạng',
 
                'width'=>'150px',
                        'trueLabel'=>'Gấp',
                         'falseLabel'=>'Bình Thường',
                         'trueIcon'=>'<small class="label label-danger"><i class="fa fa-clock-o"></i> Gấp</small>',
                         'falseIcon'=>'<small class="label label-success"><i class="fa fa-coffee"></i> </small>  '
       ],
            ['class'=>'kartik\grid\BooleanColumn',
                'vAlign'=>'middle',
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
 
                'width'=>'150px',
                        'trueLabel'=>'Đã hoàn thành',
                         'falseLabel'=>'Đang thực hiện',
 
                    ],
        

          
            ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{view} {delete}',
               'buttons' => [
                  
        'view' => function ($url, $model) {
         
            return Html::a('<span class="label label-success">Xem</span>', $url, [
                        'data-toggle'=>"modal", 'data-target'=>"#myModal",'class'=>'modelshow',
            ]);
        },
        'delete' => function ($url, $model) {
         
            return Html::a('<span class="label label-danger">Xóa</span>', $url ,
                    ['title'=>"Delete",
                        'data-confirm'=>'Bạn có chắc muốn xóa công việc này?',
                        'data-method'=>"post",
                        'data-pjax'=>"0"]);
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
            
    <div class="box box-primary">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách công việc</h3>
                  <div class="box-tools">
                    <div class="input-group">
                    
                      	  <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ?>
                       
                    </div>
                  </div>
                </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       
        'layout'=>"   <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'pager'=>['options'=>['class'=>'pagination pagination-sm no-margin pull-right']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'name',
           ['attribute' => 'first_name',
                                    'format' => 'raw',
                                    
                                   'label'=>'Người giao',
                                
                                    
                                        ],
            [ 
                'attribute' => 'created',
            'filterType' => GridView::FILTER_DATE_RANGE,
            'format' => 'raw',
            'width' => '250px',
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
            [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
                        'value' => function ($data) {
                            return $data->status == 1 ? "<span class='text-green'>Đã hoàn thành</span>" : "Đang thực hiện";
                        }
                        ,
//	    		'filter'=>   Html::activeDropDownList($searchModel, 'status', [1=>'Đã hoàn thành',0=>'Đang thực hiện'],['class'=>'form-control','prompt' => 'Trạng thái']),
                        'filter' => [1 => 'Đã hoàn thành', 0 => 'Đang thực hiện'],
//                        'filterWidgetOptions' => [
//                            'pluginOptions' => ['allowClear' => true],
////                        ],
                    ],
            // 'created',

          
            ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{view} ',
               'buttons' => [
                  
        'view' => function ($url, $model) {
         
            return Html::a('<span class="label label-success">Xem</span>', $url, [
                        'data-toggle'=>"modal", 'data-target'=>"#myModal",'class'=>'modelshow',
            ]);
        },
     
    ],
                ],  
  
        ],
    ]); 
 
 
    
    ?>

    </div></div> 
 
          </div>
<?php }?>
         <?php 
         Modal::begin(['id' => 'myModal',
    'header' => ' <h4 class="modal-title">Thông tin công việc</h4>',
   
]);
 echo "<div id='myModalContent'></div>";

Modal::end();
//
$js= "$('.modelshow').click(function(){
   
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
 $this->registerJs($js);
         ?>
        
