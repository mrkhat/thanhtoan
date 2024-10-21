<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Utils;
use kartik\grid\GridView;
 
$item=$model->getModels()[0];
$date=explode('/', $item->display_date);
 
$date=(count($date)>2?'Ngày '.$date[0].' Tháng '.$date[1].' Năm '.$date[2]:'Ngày .... Tháng .... Năm ....');
//$receiver=count($item->receiver)>1?$item->receiver:"" ;
$receiver=$item->receiver;
$deliver=$item->deliver;
$key=$item->key;

/* @var $this yii\web\View */
/* @var $model backend\modules\dntt\models\dntt */

 
?>
 <style>
        .row{ text-align: center;}
        .clear{clear:both}
       .floadr{float: right}
       .floadl{float: left}
       	@page {
		margin-top: 0.5cm;
		margin-bottom: 0.5cm;
		margin-left: 1cm;
		margin-right: 1cm;
	 
	 
	}

	 

	 

 
    </style>
     <?php 
 
  
     ?>
    <style>
@page {
    size: A5 landscape;
    margin: 2%;
}
 
  @media print 
{
   @page
   {
     size: A5 landscape;  
    size: 5.5in 8.5in ;
    size: landscape;
    
  }
}
        body{ font-family: "Times New Roman";}
        .table{margin-bottom: 0px;padding:0px}
        .table-bordered{
            border: none;
        }
        .table td,#footer{text-transform: uppercase};
        
 
        .table th{text-align: center}
         .table-bordered td,.table-bordered th {
        border-left: 1px solid #000;
        /*border-right:  1px solid #000;*/
        border-bottom: 1px solid #000;
}
.table-bordered thead  tr:last-child>th:last-child, .table-bordered tbody tr td:last-child{
      border-right:  1px solid #000;
}
      .table-bordered tr{ border-bottom: 1px solid #000;
                            border-top: 1px solid #000;
      }  
 
table {padding: 5px}
.table-bordered thead:first-child tr:first-child>th:first-child, .table-bordered tbody:first-child tr:first-child>td:first-child, .table-bordered tbody:first-child tr:first-child>th:first-child{
    -webkit-border-top-left-radius: 0px;
    border-top-left-radius: 0px; 
}
.table-bordered thead:last-child tr:last-child>th:first-child, .table-bordered tbody:last-child tr:last-child>td:first-child, .table-bordered tbody:last-child tr:last-child>th:first-child, .table-bordered tfoot:last-child tr:last-child>td:first-child, .table-bordered tfoot:last-child tr:last-child>th:first-child{
        -webkit-border-bottom-left-radius: 0px;
    border-bottom-left-radius: 0px;
    
}
.table-bordered thead:last-child tr:last-child>th:last-child, .table-bordered tbody:last-child tr:last-child>td:last-child, .table-bordered tbody:last-child tr:last-child>th:last-child, .table-bordered tfoot:last-child tr:last-child>td:last-child, .table-bordered tfoot:last-child tr:last-child>th:last-child{
    -webkit-border-bottom-right-radius: 0px;
    border-bottom-right-radius: 0px;
    -moz-border-radius-bottomright: 0px;
}
.table-bordered thead:first-child tr:first-child>th:last-child, .table-bordered tbody:first-child tr:first-child>td:last-child, .table-bordered tbody:first-child tr:first-child>th:last-child{
        -webkit-border-top-right-radius: 0px;
    border-top-right-radius: 0px;
    -moz-border-radius-topright: 0px;}

.table-bordered caption+thead tr:first-child th, .table-bordered caption+tbody tr:first-child th, .table-bordered caption+tbody tr:first-child td, .table-bordered colgroup+thead tr:first-child th, .table-bordered colgroup+tbody tr:first-child th, .table-bordered colgroup+tbody tr:first-child td, .table-bordered thead:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child td{
    border-top: 1px solid #000;
}  #sample_1 td {
           line-height: 10px!important;
            padding: 6px!important;}
    </style>
    
    <div class="row">
   
    <div class="td floadl" style="width: 40%"><div>BỆNH VIỆN ĐA KHOA ĐỒNG NAI</div>
        <div>P. Công Nghệ Thông Tin</div>
      
     
    </div>
    <div class="td floadr" style="margin-left: 100px">
    <div>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
    <div>Độc lập - Tự do - Hạnh Phúc</div>
</div>
</div>
     <div class="clear"><br></div>
  <div class="container-fluid">  
  
       
      <div style="text-align: center;font-weight: bolder; font-size: 20px"> <?php echo  "Phiếu Nhập Kho" ?> </div>
   
      <div class="row"><b><?= $date ?></b>   <div class="td floadr" style="width:20%" > <b> Số:<?=$key?></b></div></div>
       <table  class="table table-striped table-bordered table-hover">
          
      </table> 
      
    <?=            GridView::widget([
                'dataProvider' => $model,
//                'filterModel' => $searchModel,
 
              
                'toolbar' => [
        [
            'content'=>     Html::a('Thêm mới', ['create'], ['class' => 'btn btn-block btn-primary btn-sm']) ,
        ],],
                'filterPosition' => GridView::FILTER_POS_HEADER,
                'layout' => "<div class='box-header'>
                                
                             
                                    <div class='col-md-12'>
                                   
                                        </div> 
                                    </div>
                                    <div class='box-body table-responsive no-padding'>{items}</div> <div class='box-footer clearfix'>
                	<div class='row'>
                      <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='dataTables_paginate paging_simple_numbers' id='example2_paginate'>{pager}</div></div></div></div>",
           
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'width:50px;'],],
 
                 [
         
        'attribute' => 'item',
         
        'vAlign'=>'model',
 
          'width'=>'350px',
    ],
              
    
          [
         
        'attribute' => 'unit',
 'format' => 'raw',
        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['id'=>'#bills-unit'.$data->id],
        'value' => function ($data) {
                            return '<span id="bills-unit'.$data->id.'">'.$data->unit.'</span>';
                        },
        'width'=>'50px'
      
    ],
       'number',
                  [
 
        'attribute' => 'note2',
 
 
        'width'=>'250px'
      
    ],
               
      
            // 'note:ntext',

 
        ],
    ]); ?>
      <div style="font-weight: bolder">
      <div><?php echo $item->note!=""?"*".$item->note:"" ?></div>
      <div>Khoa Phòng: <?php echo $item->roomname ?></div>
 
       <div class="row">
   
        <div class="td floadl" style="width: 30%">
                 <div><b>Người Giao</b></div>
     <br><br><br><br>
     <div><b><?= $deliver ?></b></div> 
       
      
 
    </div>
    <div class="td floadl" style="width:30%">
    <div><b>Người Nhận </b></div>
        <br><br><br><br>
        <div><b><?= $receiver?></b></div>
</div>
           
     <div class="td floadr" style="margin-left: 50px">
        <div><b>Phòng Công Nghệ Thông Tin</b></div>
     <br><br><br><br>
     <div><b><?= "Hồ Huy Bình" ?></b></div> 
</div>
</div>
      
 
  </div>
  </div>
 
