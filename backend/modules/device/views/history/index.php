<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Modal;
use \kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\device\models\SearchHistory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lịch Sử Máy';
$this->params['breadcrumbs'][] = $this->title;
?>
 
   <div class="row">
    <div class="col-xs-12">

        <div class="box">
    <p>
        <?= Html::a('Create Device Location', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            ['attribute' => 'key',
                  'format' => 'raw',
                'value'=> function($data){
                $url=$data->group==1?'/bgtb':($data->group==2?'/suachuathietbi':'deviceh');
                    return$data->group==1? Html::a($data->key, ['/bgtb'.'/view?id='.$data->key],[
                                        'data-toggle' => "modal", 'title' => 'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                            ]):$data->key;
                },
                ],
            
            ['attribute' =>'name',
                  'format' => 'raw',
                'value'=>function($data){
                      $url=$data->group==1?'/bgtb':($data->group==2?'/suachuathietbi':'/deviceh');
           
                return Html::a($data->name, [$url.'/update?id=' . $data->key] );}               ]
                        ,
          'item',
       
           
         
         
           'room',
       
       
             'note',
            // 'device_id',
            // 'created',
            // 'created_by',
            // 'modified_by',
             'date',
                        ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Tùy Chọn",
                        'width' => '200px',
                        'template' => \Yii::$app->user->identity->role > 20 ? '{history}{update}{delete}' : '{history}{update}',
                        'buttons' => [
                            'history' => function ($url, $model) {

                                return isset($model->name)?Html::a('<span class="label label-success">History</span>', '/device/history?name='.$model->name, [
                                            'data-toggle' => "modal", 'title' => 'Lịch Sử Máy', "modal", 'data-target' => "#history", 'class' => 'history',
                                ]):"";
                            },
                                    'update' => function ($url, $model) {

                                return $model->group==3? Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update', 'id' => $model->key])):"";
                            }, 
                                
                                    'delete' => function ($url, $model) {

                                return  ($model->group==3)? Html::a('<span class="label label-danger">Xóa</span>', 'deviceh/delete?id='.$model->key, ['title' => "Delete",
                                            'data-confirm' => 'Bạn có chắc muốn phiếu này?',
                                            'data-method' => "post",
                                            'data-pjax' => "0"]):"";
                            }
                                ],
                            ]
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    </div></div>
                    <?php
                    Modal::begin(['id' => 'history', 'size' => 'modal-lg',
                        'header' => ' <h4 class="modal-title" id="history-tile"></h4>',
                    ]);
                    echo "<div id='historyContent'></div>";

                    Modal::end();
//
                    Modal::begin(['id' => 'myModal', 'size' => 'modal-lg',
                        'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
                    ]);
                    echo "<div id='myModalContent'></div>";

                    Modal::end();
                    $js = "
$('.print').click(function(){
   window.open($(this).attr('link'), '_blank');
})
$('.history').click(function(){
     $('#history-tile').html($(this).attr('title'));
    $('#history').find('#historyContent').load($(this).attr('href'));
});
$('.modelshow').click(function(){
     $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
                    $this->registerJs($js);
                    ?>