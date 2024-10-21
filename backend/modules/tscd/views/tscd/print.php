<?php

use yii\helpers\Html;
 
use kartik\grid\GridView;

// use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\modules\dntt\models\dntt */
?>

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

   Load paper.css for happy printing 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">-->

<style>
    /*page[size="A4"][layout="portrait"]  {
      background: white;
      width: 21cm;
      height: 29.7cm;
      display: block;
      margin: 0 auto 0.5cm;
      margin-bottom: 0.5cm;
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
      
     
     
    }
    
    
      @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
         @page {
          size: A4;
          change the margins as you want them to be. 
    }
    
    */




    /*@media print 
    {
      @page { size: A4 }
    }
    @page { size: A4 }
*/   @media print {
    .row{ text-align: center;}
    .clear{clear:both}
    .floadr{float: right}
    .floadl{float: left}
     body{ font-family: "Times New Roman";}
    /*.table-bordered > tbody > tr > td{border: 3px solid black}*/
/*    .table-bordered > thead > tr > th {border: 2px solid black}
    .table-bordered > tbody > tr > td{border: 2px solid black}*/
    /*table .myborder> tr > td {border: 3px solid black}*/
    tr{margin: 2px}
    .table-bordered tr td,.table-bordered tr th{border: 1px solid black;}
       .table-bordered tr td{ padding: 5px}
    .table-bordered tr th{ padding: 10px}
    /*table{border-spacing: 10px;border: 2px solid black}*/
    .b{font-weight: bold}	 
    div {margin-bottom: 5px}
    /* .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 256mm;
            outline: 2cm #FFEAEA solid;
        }*/
}
footer {
   position:absolute;
   bottom:0;
   width:85%;
   height:60px;   /* Height of the footer */
 text-align: right;
}
</style>
<?php
$date = explode('/', $model->display_date);
?>
<body class="A4">
    <section class="sheet padding-10mm">
        <div class="row">

            <div class="td floadl" style="width: 45%;"><div><b>BỆNH VIỆN ĐA KHOA ĐỒNG NAI				</b></div>


                <div  ><div class="floadl" style="width:100%"><b>Phòng Công Nghệ Thông Tin</b></div> </div>
            </div>
            <div class="td floadr" >CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM 
                <div>Độc lập - Tự do - Hạnh phúc</div>

            </div>
        </div>
        <div class="clear"><br></div>
        <div class="row" style="font-size: 25px"><b>Biên Bản Giao Nhận Tài Sản</b></div>
        <br>
        <br>
       
        <div> <b>Thời gian:</b><?= count($date) > 2 ? 'Ngày ' . $date[0] . ' Tháng ' . $date[1] . ' Năm ' . $date[2] : 'Ngày .... Tháng .... Năm ....' ?></div>



        <div class="b">Địa điểm:<?= $model->location ?></div>
        <div >Thành Phần Tham Dự</div>
        <div class="b rows clear">1.Khoa Phòng Giao:<?= $model->room1 ?></div>
        <div class="rows" ><div class="col-md-3 floadl" style="width: 50%"><b>Người Đại Diện:</b><?= $model->nguoigiao ?></div><div class="col-md-4 floadl"><b>Chức Vụ:</b><?= $model->cv1 ?></div></div>

        <div class="b rows clear">2.Khoa Phòng Nhận:<?= $model->room2 ?></div>
        <div class="rows" ><div class="col-md-3 floadl" style="width: 50%"><b>Người Đại Diện:</b><?= $model->nguoinhan ?></div><div class="col-md-4 floadl"><b>Chức Vụ:</b><?= $model->cv2 ?></div></div>
        <div class="clear" >Các bên tiến hành bàn giao tài sản cố định như sau:</div>

        <?=
        GridView::widget([
            'dataProvider' => $data,
//                'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table myborder'],
            'toolbar' => [
                [
//        
                ],],
//            'filterPosition' => GridView::FILTER_POS_HEADER,
            'layout' => "
             <div class='box-body table-responsive  '>{items}</div> <div class='box-footer clearfix'>
                	 </div>",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width:50px;'],],
                [
                    'label' => 'Tên Tài Sản',
                    'attribute' => 'configuration',
                    'vAlign' => 'model',
                    'width' => '400px',
                     'format' => 'html',
                     'value'=>function ($model, $key, $index, $widget) { 
                return ( "<div><b>".$model->item."</b></div>  ".\Yii::$app->formatter->asNtext($model->configuration)) ;         
                 }, 
                ],
                [
                    'label' => 'ĐVT',
                    'attribute' => 'unit',
                    'format' => 'raw',
                    'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
                    'width' => '50px'
                ],
                [
                    'label' => 'SL',
                    'attribute' => 'number',
                    'format' => 'raw',
                    'vAlign' => 'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
                    'width' => '50px'
                ],
                [

                    'attribute' => 'note',
                    'width' => '250px'
                ],
            // 'note:ntext',
            ],
        ]);
        ?>

        <br>
        <div class="row">

            <div class="td floadl" style="width: 35%;"><div><b>Bên Giao	</b></div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div  ><div class="floadl" style="width:100%"><b><?= $model->nguoigiao ?></b></div> </div>
            </div>
            <div class="td floadr b" style="margin-left: 100px">
                <div>Bên Nhận</div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="b"><?= $model->nguoinhan ?></div>

            </div>
        </div>
    </section>
    <footer><?=$model->key?></footer>
</body>