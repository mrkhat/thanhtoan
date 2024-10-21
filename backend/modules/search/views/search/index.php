<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 use yii\bootstrap\Modal;
  use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\search\models\SearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tìm kiếm');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">

        <div class="box">


       
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
           
            [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'label' => 'Từ khóa',
                'value'=>function($data){
       return Html::a('<span class="label label-success">'.$data->name.'</span>', Url::to(['/'.$data->modul.'/view','id'=>$data->id]), [
                                                                'data-toggle' => "modal", 'title'=> Yii::$app->params['search_area'][$data->modul],'data-target' => "#myModal", 'class' => 'modelshow',
                                                    ]);
                }
                ],
            [
                        'attribute' => 'modul',
                        'format' => 'raw',
                        'label' => 'Phạm vi',
                        'value' => function ($data) {
                            return Yii::$app->params['search_area'][$data->modul] ;
                        }
                        ,
//	    		'filter'=>   Html::activeDropDownList($searchModel, 'status', [1=>'Đã hoàn thành',0=>'Đang thực hiện'],['class'=>'form-control','prompt' => 'Phạm vi']),
                        'filter' => Yii::$app->params['search_area'],
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                    ],

         
        ],
    ]); ?>
     </div></div> 

</div>
          <?php 
         Modal::begin(['id' => 'myModal',
    'header' => ' <h4 class="modal-title" id="mymodal-tile"></h4>',
   
]);
 echo "<div id='myModalContent'></div>";

Modal::end();
//
$js= "$('.modelshow').click(function(){
   $('#mymodal-tile').html($(this).attr('title'));
    $('#myModal').find('#myModalContent').load($(this).attr('href'));
});";
 $this->registerJs($js);
         ?>
