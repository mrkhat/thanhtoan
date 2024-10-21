<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use backend\modules\users\models\UserTypes;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\users\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thành viên quản trị';
$this->params['breadcrumbs'][] = $this->title;
?>
               <div class="row">
            <div class="col-xs-12">
            
    <div class="box">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách thành viên</h3>
                  <div class="box-tools">
                    <div class="input-group">
                    
                      	  <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ?>
                       
                    </div>
                  </div>
                </div><!-- /.box-header -->
             
<?php $user_role=\Yii::$app->user->identity->role;
if($user_role==30){
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"   <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'pager'=>['options'=>['class'=>'pagination pagination-sm no-margin pull-right']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             ['attribute' => 'first_name',
            'format' => 'raw',
                 'label'=>'Tên thành viên',
             'value' => function ($data) {
             return Html::a($data->first_name,['update?id='.$data->id]); }
        ],
                  'email:email',
          ['attribute' => 'last_name',
                            'format' => 'raw',
                      
                            'label' => 'Chức vụ',
                            'value' => function ($data) {
                             
                                return Yii::$app->params['position'][$data->last_name];
                            }
                                ],
          
             ['attribute' => 'role',
                            'format' => 'raw',
                         
                            'label' => 'Quản trị',
                            'value' => function ($data) {
                                  $userType = UserTypes::findOne(['id' => $data->role]);
                                return $userType->type;
                            }],
                                       [ 
            'attribute' => 'status',
            'format' => 'raw',
             'label'=>'Trạng thái',
               
                'value' => function ($data) {
                return  $data->status==1?"<span class='text-green'>Kích hoạt</span>":"Tạm ngưng"; }
       ]
            
            ,
            // 'created_date',
            // 'modified_date',

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
                        'data-confirm'=>'Bạn có chắc muốn xóa đối tác này?',
                        'data-method'=>"post",
                        'data-pjax'=>"0"]);
        }
    ],
                ], 
        ],
    ]); ?>
<?php }else{?>
                 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"   <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'pager'=>['options'=>['class'=>'pagination pagination-sm no-margin pull-right']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             ['attribute' => 'first_name',
            'format' => 'raw',
                 'label'=>'Tên thành viên',
             'value' => function ($data) {
             return Html::a($data->first_name,['update?id='.$data->id]); }
        ],
                  'email:email',
          ['attribute' => 'last_name',
                            'format' => 'raw',
                      
                            'label' => 'Chức vụ',
                            'value' => function ($data) {
                             
                                return Yii::$app->params['position'][$data->last_name];
                            }
                                ],
          
             ['attribute' => 'role',
                            'format' => 'raw',
                         
                            'label' => 'Quản trị',
                            'value' => function ($data) {
                                  $userType = UserTypes::findOne(['id' => $data->role]);
                                return $userType->type;
                            }],
                                       [ 
            'attribute' => 'status',
            'format' => 'raw',
             'label'=>'Trạng thái',
               
                'value' => function ($data) {
                return  $data->status==1?"<span class='text-green'>Kích hoạt</span>":"Tạm ngưng"; }
       ]
            
            ,
            // 'created_date',
            // 'modified_date',

          ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{view}',
               'buttons' => [
                  
        'view' => function ($url, $model) {
         
            return Html::a('<span class="label label-success">Xem</span>', $url, [
                        'data-toggle'=>"modal", 'data-target'=>"#myModal",'class'=>'modelshow',
            ]);
        },
      
    ],
                ], 
        ],
    ]); ?>
<?php }?>
</div>
    
    </div></div> 
 
 
         <?php 
         Modal::begin(['id' => 'myModal',
    'header' => ' <h4 class="modal-title">Thông tin khách hàng</h4>',
   
]);
 echo "<div id='myModalContent'></div>";

Modal::end();
//
$js= "$('.modelshow').click(function(){
   
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
 $this->registerJs($js);
         ?>
        