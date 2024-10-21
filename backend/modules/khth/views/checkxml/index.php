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
                return $data['stn'] . "</br>" . $data['MaYTe'] . "</br>" . $data['BenhNhan_Id'];
            }
        ],
       
         [ 'header' => 'Thông KHỞI TẠO',
            'format' => 'raw',
            'width' => '250px',
            'value' => function ($data) {
                return 
            $data['NgayTao']."</br>".
            $data['MaPhongBan']."-".$data['TenPhongBan'] . "</br>" .$data['NguoiTao_Id']."-". $data['User_Name'];
            }
        ],
        [ 'header' => 'Thông Tin Bệnh Nhân',
            'format' => 'raw',
            'width' => '550px',
            'value' => function ($data) {
                return $data['TenBenhNhan'] . "</br><span class='btn-success'>" . $data['TN_diachi']."</span></br>" . $data['BN_diachi'];
            }
        ],
        [ 'header' => 'Mã Địa Chỉ ba Cấp',
            'format' => 'raw',
            'width' => '250px',
            'value' => function ($data) {
           return "<div><span>TN: </span><span class='btn-success'> " . $data['TN_MaTinhThanh'] . "</span><span class='btn-primary'>" . $data['TN_MaQuan'] . "</span><span class='btn-warning'>" . $data['TN_MaXP'] . "</span></div>"
                   ."<div><span>BN: </span><span class='btn-success'>" . $data['BN_MaTinhThanh'] . "</span><span class='btn-primary'>" . $data['BN_MaQuan'] . "</span><span class='btn-warning'>" . $data['BN_MaXP'] . "</span></div>";           
            }
        ],  [ 'header' => 'ID ba Cấp(TN/BN)',
            'format' => 'raw',
             'width' => '250px',
            'value' => function ($data) {
            
                return "<div><span>TN: </span><span class='btn-success'> " . $data['TN_TinhThanhID'] . "</span><span class='btn-primary'>" . $data['TN_QuanHuyenID'] . "</span><span class='btn-warning'>" . $data['TN_XaPID'] . "</span></div>"
                        . "<div><span>BN: </span><span class='btn-success'> " . $data['BN_TinhThanhID'] . "</span><span class='btn-primary'>" . $data['BN_QuanHuyenID'] . "</span><span class='btn-warning'>" . $data['BN_XaPID'] . "</span></div>";
            }
        ],
                [ 'header' => 'Địa Chỉ ba Cấp',
            'format' => 'raw',
            'width' => '550px',
            'value' => function ($data) {
           return "<div><span class='btn-success'>" . $data['TN_TenTinhThanh'] . "</span><span class='btn-primary'>" . $data['TN_TenQuan'] . "</span><span class='btn-warning'>" . $data['TN_TenXaP'] . "</span></div>"
                   ."<div><span class='btn-success'>" . $data['BN_TenTinhThanh'] . "</span><span class='btn-primary'>" . $data['BN_TenQuan'] . "</span><span class='btn-warning'>" . $data['BN_TenXaP'] . "</span></div>";
               }
        ],
      
        [ 'header' => 'IDBN& Check IDTN',
            'filter' => true,
            'format' => 'raw',
            'value' => function ($data) {
                $idtn = $data['TN_TinhThanhID'] . $data['TN_QuanHuyenID'] . $data['TN_XaPID'];
                $idbn = $data['BN_TinhThanhID'] . $data['BN_QuanHuyenID'] . $data['BN_XaPID'];
                $isset =isset($data['BN_TinhThanhID'])&& isset($data['BN_QuanHuyenID']) && isset($data['BN_XaPID']);
                $isstop=$data['BN_T_TamNgung']&&$data['BN_Q_Ngung']&&$data['BN_XP_Ngung'];
                return ($idtn == $idbn)&&($isset)&&(!$isstop) ? "<span class='btn-success'>yes</span>" : "<span class='label-danger'>no</span>";
            }
        ],
        [ 'header' => 'Lock',
            'format' => 'raw',
            'value' => function ($data) {
                return "<div><span class='btn-success'>" . $data['TN_T_TamNgung'] . "</span><span class='btn-primary'>" . $data['TN_Q_Ngung'] . "</span><span class='btn-warning'>" . $data['TN_XP_Ngung'] . "</span></div>".
                         "<div><span class='btn-success'>" . $data['BN_T_TamNgung'] . "</span><span class='btn-primary'>" . $data['BN_Q_Ngung'] . "</span><span class='btn-warning'>" . $data['BN_XP_Ngung'] . "</span></div>";
            }
        ],
                [
                                                                    'width' => '100px',
                                                                    'format' => 'raw',
                                                                    'label' => 'Tùy chọn',
                                                                    'filter' => false,
                                                        
                                                                    'value' => function ($data) {
                                         
                                                                               $update = Html::a('<i class="fa fa-pencil-square label label-warning " aria-hidden="true">Update</i>', Url::to(['update', 'id' => $data['stn'],'tn'=>Yii::$app->request->queryParams['tn']]));
                                                                    
                                                                        $d =  $update   ;
                                                                        return $d;
                                                                    }
                                                                        ],
]]);
