<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Utils;

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
    $date=explode('/', $model->created_date);
    ?>
     
    <div class="row">
 
    <div class="td floadl" style="width: 35%;"><div><b>SỞ Y TẾ ĐỒNG NAI</b></div>
     <div><div class="floadl" style="width:100%">BỆN<u>H VIỆN ĐA KHOA ĐỒNG N</u>AI</div> </div>
    </div>
    <div class="td floadr" style="margin-left: 100px">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM
    
    <div>Độ<u>c lập - Tự do - Hạnh P</u>húc</div>
</div>
    </div></div>
     <div class="clear"><br></div>
     <div style="text-align: center;font-weight: bolder; font-size: 25px"> GIẤY RA CỔNG </div>
    
  <div class="container-fluid">  
 
      
      
<table  class="table table-striped table-bordered table-hover" id="sample_1">
					 
						<tbody>	
                                               
                                                    <tr>
                                                        <td style="width: 100px">Kính gửi: </td><td>	 Phòng Bảo vệ Bệnh viện ĐK Đồng Nai</td>
                                                         
                                                    </tr>
                                                    <tr> <td> Khoa – phòng: </td><td><?php echo $model->room ?></td></tr> 	
                                                    <tr><td>Sửa chữa máy:   </td><td><?php echo $model->items ?></td> </tr>
                                                    <tr><td>Do ông (bà): </td> <td><?php echo $model->company ?></td></tr>
                                                    <tr><td colspan="2">Số lượng:  <?php echo $model->number ?>	Đơn vị tính: <?php echo $item->unit ?>  </td>  </tr>

                                                    <tr><td colspan="2">Kính mong bảo vệ giải quyết cho ra cổng.</td></tr>

                                                    
                                                	</tbody>
					</table>
       
      <b>   <div style="float: right;width: 300px;text-align: center">Đồng Nai, <?= count($date)>2?'Ngày '.$date[0].' Tháng '.$date[1].' Năm '.$date[2]:'Ngày .... Tháng .... Năm ....'?></div>
      </b><div style="clear: both"></div>
          <b>   <div style="font-size:18px;float: right;width: 300px;text-align: center">Giám Đốc Bệnh Viện</div> </b>
      </br>    </br>    </br> </br>
      
  </div>
</body>
</html>
