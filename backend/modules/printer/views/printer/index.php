<?php

use yii\helpers\Html;
//use common\widgets\GridView;
use \kartik\grid\GridView;
use yii\web\JsExpression;
$url2=\yii\helpers\Url::to(['/room/list']);
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\printer\models\PrinterSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Printers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Printer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'instore', 'filter' => array("X" => "Kho",)],
        'day_instore',
//        ['class' => 'kartik\grid\EditableColumn',
//            'editableOptions'=>['header'=>'key', 'size'=>'md','formOptions' => ['action' => ['/mayin/edititems']]],
//            'attribute' => 'key'],
//        ['class' => 'kartik\grid\EditableColumn',
//                'editableOptions'=>['header'=>'Ghi Chú', 'size'=>'md','formOptions' => ['action' => ['/mayin/edititems']]],
//            'attribute' => 'model',],
//        ['class' => 'kartik\grid\EditableColumn',
//            'action' => ['/printer/edititems'],
//            'attribute' => 'departments_id',],
//        ['class' => 'kartik\grid\EditableColumn',
//            'action' => ['/printer/edititems'],
//            'attribute' => 'serrial',],
//            'room',
//                     'day_delivery',
      
            'key',
        'model',
            'serrial',
           
           ['attribute' => 'departments_id',
               'label'=>'Khoa Phòng',
 
                   'value'=>'roomName',
                        'group' => true,
                        'subGroupOf' => 1,
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'hideSearch' => true,
                            'initValueText' => 'roomName',
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
                    ],
            'day_delivery',
            'company',
           'day_manufacture',
     
//             'room',
             'note2',
             'note',
            
             'type',
            ['attribute' => 'price',
             'format'=>['decimal',0],
                
                    ],
       ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{update} ',
               'buttons' => [
                  
        'update' => function ($url, $model) {
         
            return Html::a('<span class="label label-success">Cập nhật</span>',Url::to([$url,'id'=>$model->id]), [
                         
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
    ]); ?>
</div>
