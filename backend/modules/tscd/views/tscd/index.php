<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

//use common\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\tscd\models\TscdSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tscds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tscd-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
 
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
               'filterPosition' => GridView::FILTER_POS_HEADER,
                'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
         'toolbar' => [
                    [
                        'content' =>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                            'type' => 'button',
                            'title' => Yii::t('app', 'Thêm Mới'),
                            'class' => 'btn btn-success'
                        ]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
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
                'panel' => ['type' => 'primary', 'heading' => 'Quản Lý Phiếu bàn giao tài sản cố định'],
        'columns' => [
             
              ['attribute' => 'key',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
//            'id',
             ['attribute' => 'display_date',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
           ['attribute' => 'location',
                        'group' => true,
                        'subGroupOf' => 0,
                    ],
        
//            'nguoigiao',
//            'cv1',
            ['attribute' => 'room1',
                        'group' => true,
                        'subGroupOf' => 0],
          
//             'nguoinhan',
//             'cv2'
//             ,
            ['attribute' => 'room2',
                        'group' => true,
                        'subGroupOf' => 0],
   
            'item',
            'unit',
            'number',
            // 'configuration:ntext',
            // 'note:ntext',
            
            
            
            [ 
                        'width' => '200',
                        'format' => 'raw',
                        'label' => 'Tùy chọn',
                        'filter' => false,
                        'group' => true,
                        'subGroupOf' => 0,
                        'value' => function ($data) {
                            $view = Html::a('<span class="label label-success">Xem</span>', Url::to(['view', 'id' => $data->key]), [
                                        'data-toggle' => "modal", 'title' => 'Thông tin chi tiết phiếu', "modal", 'data-target' => "#myModal", 'class' => 'modelshow',
                            ]);
                          
                            $update = Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update', 'id' => $data->key]));
                            $print = Html::a('<i class="fa fa-print label label-info" aria-hidden="true">In</i>', Url::to(['print', 'id' => $data->key]), ['link' => Url::to(['print', 'id' => $data->key]), 'class' => 'print', 'target' => '_blank'
                            ]);
                            $role = \Yii::$app->user->identity->role;
                            $d = $role > 10 ? $update . $print : $view .$updates;
                            return $d;
                        }
                    ],
            
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?></div>
