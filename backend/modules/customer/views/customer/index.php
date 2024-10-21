<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Utils;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\customer\models\SearchCustomer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý khách hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?>
          <div class="row">
            <div class="col-xs-12">
            
    <div class="box">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách khách hàng</h3>
                  <div class="box-tools">
                    <div class="input-group">
                    
                      	  <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ?>
                       
                    </div>
                  </div>
                </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
        ],   ['attribute' => 'project_id',
            'format' => 'raw',
             'value' => function ($data) {
             $project=array();
             if($data->project_id){
             $project_id= explode(',', $data->project_id);
               
             foreach ($project_id as $value) {
              $project[]=   Html::a('#'.$value, ['/project/view?id=' . $value], [
                                        'data-toggle' => "modal",'title'=>'Thông tin dự án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    ]) ;
             }}
             return implode("<br>",$project); }
        ],
            'phone',
                'birthday',
            'address',
            'email:email',
            'created',
//             'activate',

    
            ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{view} {delete}',
               'buttons' => [
                  
        'view' => function ($url, $model) {
         
            return Html::a('<span class="label label-success">Xem</span>', $url, [
                        'data-toggle'=>"modal", 'title'=>'Thông tin khách hàng','data-target'=>"#myModal",'class'=>'modelshow',
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
    ]); 
 
 
    
    ?>
    
    </div></div> 
 <?php }else {
 ?> 
         <div class="row">
            <div class="col-xs-12">
            
    <div class="box">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách đối tác</h3>
              
                </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"   <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
        'pager'=>['options'=>['class'=>'pagination pagination-sm no-margin pull-right']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             'name',
              ['attribute' => 'project_id',
            'format' => 'raw',
             'value' => function ($data) {
             $project=array();
             if($data->project_id){
             $project_id= explode(',', $data->project_id);
               
             foreach ($project_id as $value) {
              $project[]=   Html::a('#'.$value, ['/project/view?id=' . $value], [
                                        'data-toggle' => "modal",'title'=>'Thông tin dự án', 'data-target' => "#myModal", 'class' => 'modelshow',
                                    ]) ;
             }}
             return implode("<br>",$project); }
        ],
                'birthday',
            'address',
            'email:email',
            'created',
//             'activate',

    
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
