<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Utils;
use yii\bootstrap\Modal;
 
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\partner\models\SearchPartner */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý đối tác';
$this->params['breadcrumbs'][] = $this->title;
?>
 

 
          <div class="row">
            <div class="col-xs-12">
            
    <div class="box box-primary">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách đối tác</h3>
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
        ],
            'contact',
            'position',
            'phone',
             'email:email',
             'discount',
            // 'note',
            [
            'attribute' => 'attach',
            'format' => 'raw',
             'label'=>'Báo Giá',
               
                'value' => function ($data) {
                    $url=$data->attach==''?'Chưa có báo giá':Html::a('Xem báo giá',Utils::loadImage('baogia/'.$data->attach),['target'=>'_blank','class' => 'linksWithTarget']); 
                    
                return $url;}
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
 
          </div>
 
         <?php 
         Modal::begin(['id' => 'myModal',
    'header' => ' <h4 class="modal-title">Thông tin đối tác</h4>',
   
]);
 echo "<div id='myModalContent'></div>";

Modal::end();
//
$js= "$('.modelshow').click(function(){
   
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
 $this->registerJs($js);
         ?>
        