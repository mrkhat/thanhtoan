  
<?php

use yii\helpers\Html;
use \kartik\grid\GridView;
use backend\modules\bills\models\Tonkho;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\room\models\SearchRoom */
/* @var $dataProvider yii\data\ActiveDataProvider */
          $dataProvider = new ActiveDataProvider(['query'=>Tonkho::find()->orderBy(['ton'=>'desc']), 'pagination' => false,]);
 ?>
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
      
       'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
//                'filterPosition' => GridView::FILTER_POS_HEADER,
//                
//                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
//                'showPageSummary' => true,
                   
                   'export' => [
                    'fontAwesome' => true,
                    'showConfirmAlert' => false,
                    'target' => GridView::TARGET_BLANK
                ],
                'exportConfig' => [
                    GridView::EXCEL => ['label' => 'Excel'],
                ],
                'toolbar' => [
                    [
                        'content' =>
                 
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/'], [
                            'class' => 'btn btn-default',
                            'title' => Yii::t('app', 'Làm mới')
                        ]),
                    ],
                    '{toggleData}',
                    '{export}',
                ],
                'pjax' => true,
                'striped' => true,
                'hover' => true,
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Phiếu Bàn Giao Thiết Bị'],
      
      
      
              'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          ['attribute'=>'itemid','label'=>'id'],
          ['attribute'=>'itemtype','label'=>'Loại'],
          ['attribute'=>'item','label'=>'Thiết Bị'],
          ['attribute'=>'nhap','label'=>'Nhập',],
          ['attribute'=>'xuat','label'=>'Xuất','value'=>function ($data) {    return    !is_numeric($data->xuat)?0:$data->xuat;}],
          ['attribute'=>'ton','label'=>'Tồn',
              
              'contentOptions'=>function($data) { 

        if($data->ton <5)

            return ['style' => 'color:red;background-color: yellow;' ];  

        else
             return ['style' => 'color:blue'];  
          

     },
              'value'=>function ($data) {    return    !is_numeric($data->ton)?0:$data->ton;}],
                   
        ],
    ]); ?>