<?php

use yii\helpers\Html;
//use common\widgets\GridView;
use kartik\export\ExportMenu;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\helpers\Url;
?>
<h1></h1>
 
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php

 
 $searchTn = Html::textarea( 'tn',$tn)
?>
<?=
GridView::widget([
    'dataProvider' => $sql,
    'filterPosition' => GridView::FILTER_POS_HEADER,
    
    'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
    'panel' => ['type' => 'primary', 'heading' => 'TÌNH HÌNH NHÂN LỰC ĐD-KTV-HS-HL HÀNG NGÀY',
        'before' => "<div > " . $searchTn . "</div>",
    ],
        "filterSelector" => 'textarea[name="tn"]',

      'floatHeader' => true,
//    'showPageSummary' => true,
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
           
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/khth/checkxml'], [
                'class' => 'btn btn-default',
                'title' => Yii::t('app', 'Làm mới')
            ]),
        ],
        '{toggleData}',
        '{export}',
    ], 'pjax' => true,
    'striped' => true,
    'hover' => true,
//       
    'columns' => [
        ['class' => '\kartik\grid\SerialColumn'],
        [ 'header' => 'STN/MYT/IDBN',
            'format' => 'raw',
            'value' => function ($data) {
                return $data['stn'] . "</br>" . $data['MaYTe']."</br>" . $data['TenBenhNhan'] ;
            }
        ],
        [ 'header' => 'Nơi Tiếp Nhận/TG Tiếp Nhận',
            'format' => 'raw',
            'value' => function ($data) {
                return $data['TN_TenPhongBan'] ."</br>" . $data['ThoiGianTiepNhan'] ;
            }
        ],
         [ 'header' => 'Nơi Chỉ Định',
            'format' => 'raw',
            'value' => function ($data) {
                return $data['NoiChiDinh'];
            }
        ],
        [ 'header' => 'Phòng Khám/Thời Gian Khám',
            'format' => 'raw',
            'value' => function ($data) {
                return $data['TenDichVu'] ."</br>" . $data['ThoiGianKham'] ;
            }
        ],
            [ 'header' => 'Cách Giải Quyết',
            'format' => 'raw',
            'value' => function ($data) {
                return $data['CachGiaiQuyet']  ;
            }
        ],   
        [
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'Đả Khám',
            'vAlign' => 'middle',
            'trueLabel' => 'Hoàn Thành',
            'falseLabel' => 'Chưa giao',
             'value' => function ($data) {
                return $data['TrangThai']=="CoKetQua"?1:0  ;
            }
        ],
]]);
