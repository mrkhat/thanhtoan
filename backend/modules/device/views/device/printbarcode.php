<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Utils;

//var_dump($model)
$key=  explode(',', trim($model, "\"  [ ]"));
 




/* @var $this yii\web\View */
/* @var $model backend\modules\dntt\models\dntt */

 
?>
 <style>
        .row{ text-align: center; padding-top:0.5cm ; height: 100%;font-weight: bolder}
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

 
  @media print 
{
  
}
        body{ ;font-size: 30px}
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
 <?php foreach ($key as $i => $item) :    ?>	
 <div class="row">
   
    <div class="td floadl" style=" width: 40% ;font-weight: bolder">
        <div> <?php echo TRim($item," \" " )?></div>            
     
    </div>
    <div class="td floadr" style="width:50%;margin-left: 100px ;font-weight: bolder">
   <div><?php echo TRim($item," \" ")?></div>
</div>
</div>
        <?php endforeach; ?>
  
 
