<?php

use yii\helpers\Html;
//use common\widgets\GridView;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
   use yii\web\JsExpression;
   use yii\helpers\Url;
    use backend\modules\room\models\Room;
   $url2=\yii\helpers\Url::to(['/room/list']);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\bills\models\SearchItems */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản Lý Phiếu Bàn Giao Thiết Bị';
$this->params['breadcrumbs'][] = $this->title;

$roomname = empty(Yii::$app->request->queryParams['SearchSctb']['roomid']) ? '' : Room::findOne(Yii::$app->request->queryParams['SearchSctb']['roomid'])->name;
 
?>
  <div class="row">
    <div class="col-xs-12">

        <div class="box">

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
          'filterPosition' => GridView::FILTER_POS_HEADER,
             
           'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
        'showPageSummary' => true,
             'export'=>[
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
    ],  
          'exportConfig' => [
                GridView::EXCEL => ['label' => 'Excel'],
            ],
        'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                    'type'=>'button', 
                    'title'=>Yii::t('app', 'Thêm Mới'), 
                    'class'=>'btn btn-success'
                ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/bgtbnuoc'], [
                    'class' => 'btn btn-default', 
                    'title' => Yii::t('app', 'Làm mới')
                ]),
        ],
       
        '{toggleData}',
             '{export}',
    ],
        'pjax'=>true,
    'striped'=>true,
    'hover'=>true,
    'panel'=>['type'=>'primary', 'heading'=>'Quản Lý Phiếu Bàn Giao Thiết Bị'],
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
         

 
            ['attribute'=>'key', 
                'width' => '100px',
                'format' => 'raw',
                 'value' => function ($data) {
             return Html::a($data->key,['update?id='.$data->key]); 
              
             
                 }, 'group'=>true,  
                ],
//            'type',
            ['attribute'=>'item','format' => 'raw' ,  'width'=>'350px',],
            'unit',  
                         ['attribute'=>'number','width'=>'50px',
            
                         'pageSummary'=>true],
            // 'serial',
              ['attribute'=>'roomid',
                  
                   'value'=>function ($model, $key, $index, $widget) { 
                return $model->roomname;
         
             
                 }, 
                         'group'=>true,
                          'subGroupOf'=>1,
                  'filterType'=>GridView::FILTER_SELECT2,
                    
            'filterWidgetOptions'=>[
                'hideSearch' => true,
                 'initValueText'=> $roomname,
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
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
//  
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(device) {return device.name || device.text;}'),
                        'templateSelection' => new JsExpression('function (device) { return device.name || device.text; }'),
                    ],
            ],
                  ] ,
 
         
            // 'note:ntext',
            ['attribute'=>'deliver',
                'group'=>true,
               'subGroupOf'=>0,
                ],
                                     ['attribute'=>'receiver',
                'group'=>true,
               'subGroupOf'=>0,
                ],
            // 'receiver',
            // 'created_date'
          ['attribute'=>'display_date', 
              'group'=>true,
               'subGroupOf'=>0,] ,
            ['class'=>'kartik\grid\BooleanColumn',
                'group'=>true,
                            'subGroupOf'=>0,
                'vAlign'=>'middle',
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
 
                'width'=>'150px',
                        'trueLabel'=>'Hoàn Thành',
                         'falseLabel'=>'Chưa giao',
 
                    ],
             
            // 'status',
            // 'status1',
            // 'status2',
            // 'unit',
            // 'note2',
            // 'source',

                       ['attribute'=>'status1',
                            'width'=>'250px',
                              'format' => 'raw',
                            'label' => 'Tùy chọn',
                           'filter'=>false,
                           'group'=>true,
                          'subGroupOf'=>0,
                        
                                           'value' => function ($data) {
                   $view=  Html::a('<span class="label label-success">Xem</span>', Url::to(['view','id'=>$data->key]), [
                                                                'data-toggle' =>  "modal",'title'=>'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                                                    ]); 
                    $update=  Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update','id'=>$data->key]) );
                   $print=  Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', Url::to(['print','id'=>$data->key]), ['link'=>Url::to(['print','id'=>$data->key]),  'class'=>'print','target'=>'_blank'
                                                    ]);
                   
             $role=\Yii::$app->user->identity->role;
                   $d=$role>10?$view.$update.$print:($data->status==1?$view.$print:$view.$update.$print);
             return $d;
              
             
                 }

                                                 
                                                ],
        ],
    ]); ?>
</div></div> 
                </div>
             <?php
             Modal::begin(['id' => 'myModal','size'=>'modal-lg',
                 'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
            ]);
            echo "<div id='myModalContent'></div>";

            Modal::end();
//
            
            $js = " 
$('.print').click(function(){
    var url= $(this).attr('link') ;
      window.location.href=url;
})                
$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
            $this->registerJs($js);
        