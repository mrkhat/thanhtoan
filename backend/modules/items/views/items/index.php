<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
 use common\components\Utils;
use yii\helpers\Url;
 
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\SearchItemInformation */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Item Informations');
$this->params['breadcrumbs'][] = $this->title;
?>
          <div class="row">
            <div class="col-xs-12">
            
    <div class="box box-primary">
             
      <div class="box-header">
                  <h3 class="box-title">Danh sách thiết bị</h3>
                  <div class="box-tools">
                    <div class="input-group">
                    
                      	  <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ?>
                       
                    </div>
                  </div>
                </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'name',
            'unit',
              ['class'=>'kartik\grid\BooleanColumn',
                'vAlign'=>'middle',
                        'attribute' => 'status',
                        'format' => 'raw',
                        'label' => 'Trạng thái',
 
                'width'=>'150px',
                        'trueLabel'=>'Sẳn sàn',
                         'falseLabel'=>'Tắt',
 
                    ],
            'typename',
            // 'statust',
            // 'type',
[
                        'attribute' => 'group',
                        'format' => 'raw',
                        'label' => 'Nhóm thiết bị',
                        'value' => function ($data) {
        
                            return $data->groupname ;
                        }
                        ,
//	    		'filter'=>   Html::activeDropDownList($searchModel, 'group', [1=>'Vật tư điện',2=>'Vật Tư Nước'],['class'=>'form-control','prompt' => 'chọn nhóm']),
                        'filter' => (Utils::LGItem()),
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                    ],
               ['class' => 'yii\grid\ActionColumn',
                 'header'=>"Tùy Chọn",
                'template'=>'{update} {delete}',
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
                </div></div> 
 