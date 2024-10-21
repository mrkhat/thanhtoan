<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Utils;

$date=explode('/', $model[0]->display_date);
$date=(count($date)>2?'Ngày '.$date[0].' Tháng '.$date[1].' Năm '.$date[2]:'Ngày .... Tháng .... Năm ....');

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
  
       
      <div style="text-align: center;font-weight: bolder; font-size: 20px"> <?php echo "Phiếu Sửa Chữa Thiết Bị" ?> </div>
         <div class="row"><b><?= $date ?></b></div>
       <table  class="table table-striped table-bordered table-hover">
          
      </table> 
      
<table  class="table table-striped table-bordered table-hover" id="sample_1" style="font-size: 12px">
						<thead>
							<tr>
							 
								<th style="width:5px;">STT</th>
								<th class="hidden-480">Thiết bị</th>
                                                          
                                                                <th style="width:60px;">ĐVT</th>
                                                                <th style="width:30px;">SL</th>	
 
							 
								<th class="width:500px;">Note</th>																																																																					
							</tr>																																																	
						</thead>
						<tbody>	
                                               
                            	
                                                 </form>   
                                                    
                                                    <?php  if($model && is_array($model) && count($model)):?>
							<?php 
                                                       
				        	$ids = array();
				        	$sw  = false;
				        	foreach ($model as $i => $item) :        		            	
 
                                                $name=$item->item;
                                                
                                                $unit=$item->unit;
                                                $number=$item->number;
                                                $note=$item->note
                                                
 			            	
				        	?>
                                                    
                                               
							<tr class="<?php echo $sw = !$sw ? 'odd' : 'even';?> gradeX">
								<!--<td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $item->id;?>" /></td>-->
                                                            <td style="text-align: center"> <?php echo $i + 1 ?></td>
                                                                <td class="hidden-480" ><span    id='<?php echo $item->id ?> item' class="click" style="display: inline"><?php echo $name;?></span></td>
                                                                <td class="hidden-480"  ><center><?php echo $unit;?></center></td> 
                                                                <td class="hidden-480"><span    id='<?php echo $item->id ?> number' class="click" style="display: inline"><?php echo $number;?></span> </td>
                                                                <td class="hidden-480"><span    id='<?php echo $item->id ?> number' class="click" style="display: inline"><?php echo $note;?></span> </td> 
<!--                                                																								-->
							</tr>																																							        		
				             <?php endforeach; ?>
                                                        <?php endif; ?>
					
					
						
                                                 
                                                	</tbody>
					</table>
      <div style="font-weight: bolder">
      <div><?php echo $item->note2!=""?"*".$item->note2:"" ?></div>
      <div>Khoa Phòng: <?php echo $item->roomname ?></div>
     <?php if( $type!=2): ?> <div>Nguồn: <?php echo $item->source ?></div> <?php endif; ?>
      <div id="footer" style="width: 100%">
          <div style=";float: left;text-align: center" >
              <div>NGƯỜI NHẬN HÀNG</div>
              </br </br></br></br>
              <div><?php echo $item->receiver?></div>
          </div>
          <div style=" float: right;text-align: center">
              <div>NGƯỜI GIAO HÀNG</div>
              </br </br></br></br> 
              <div><?php echo $item->deliver?></div> 
              
          
          </div></div>
      
      <div style="width: 100%"><div style="width: 50%;float: left" ></div><div style=" float: right"></div></div>
  </div>
  </div>
 
