<?php

use yii\helpers\Html;
 
//use backend\modules\room\models\Room;
 
   $url2=\yii\helpers\Url::to(['/room/list']);
   use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\bills */
/* @var $form yii\widgets\ActiveForm */
 
use kartik\grid\GridView;
 
?>

<div class="row">
 

  <div class="col-md-12">
    <div class="box-body">
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'roomname',
            [ 'attribute' => 'type','format' => 'raw',
                'value' => $model->type==0?'Phiếu Nhâp':'Phiếu Giao'
           
      
          ],
           
             
            
           
           
            
            'deliver',
            'receiver',
            
            'display_date',
            [ 'attribute' => 'status','format' => 'raw',
                'value' => $model->status==0?'Chưa hoàn thành':'Đã hoàn thành'
           
      
          ],
            'note2:ntext',
             
             
        ],
    ]) ?>
    </div>
    
        <div  class="form-group">
       <?=            GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
 
              
     
                'filterPosition' => GridView::FILTER_POS_HEADER,
                'layout' => "<div class='box-header'>
                                
                             
                                    <div class='col-md-12'>
                                    {summary}  
                                        </div> 
                                    </div>
                                    <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
           
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'width:50px;'],],
['attribute' => 'id', 'width'=>'50px'],
                 [
        
        'attribute' => 'item',
         
        'vAlign'=>'model',
 
          'width'=>'350px',
    ],
                   [
        
        'attribute' => 'serial',
         
        'vAlign'=>'model',
 
          'width'=>'350px',
    ],     
    
          [
         
        'attribute' => 'unit',
 'format' => 'raw',
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
        'value' => function ($data) {
                            return '<span id="bills-unit'.$data->id.'">'.$data->unit.'</span>';
                        },
        'width'=>'50px'
      
    ],
            [
       
        'attribute' => 'number',
    'width'=>'50px',
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
   
         
      
    ],
                  [
     
        'attribute' => 'note',
 
        'vAlign'=>'middle',
//        
        'width'=>'250px'
      
    ],
               
      
            // 'note:ntext',

 
        ],
    ]); ?>
        </div>
 
   
  

</div>
</div>