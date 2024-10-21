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
    $date=explode('/', $model->date_of_payment);
    ?>
<div class="row">
   
    <div class="td floadl" style="width: 40%"><div>Đơn vị: Bệnh viện ĐK Đồng Nai</div>
        <div>Bộ phận: Phòng Công Nghệ Thông Tin</div>
      
        <div  ><div class="floadl" style="width:60%">Mã đơn vị CQHVNS  </div><div class="floadr">:10737798<br>:9044896</div> </div>
    </div>
    <div class="td floadr" style="margin-left: 100px">Mẫu số C37 – HD
    <div>( Ban hành theo QĐ số: 19/2006/QĐ – BTC</div>
    <div>Ngày 30/3/2006 của Bộ trưởng BTC )</div>
</div>
</div>
    <div class="clear"><br></div>
    <div class="row"><b>GIẤY  ĐỀ NGHỊ THANH TOÁN</b></div>
        <div class="row"><b><?= count($date)>2?'Ngày '.$date[0].' Tháng '.$date[1].' Năm '.$date[2]:'Ngày .... Tháng .... Năm ....'?></b></div>
        <div style="text-align: right"><b>Số:............</b></div>
         <div class="row "><b>Kính gửi:  Ban Giám Đốc Bệnh viện</b></div>
         <div>Họ và tên người đề nghị thanh toán:<?= $model->user?></div>

         <div>Bộ phận ( hoặc địa chỉ ): Phòng Công Nghệ Thông Tin</div>
         <div><div class="floadl" style="width:25%">Nội dung thanh toán:</div><div class="floadr" style="text-align: justify;"><b><?= $model->name?></b></div></div>
<div>Số tiền:<b><?= number_format($model->money).' VNĐ'?></b>Viết bằng chữ: <b><?= Utils::convert_number_to_words($model->money)?> đồng</b></div>
          <div>( Kèm theo chứng từ gốc )</div>
        
          <div class="row">
              <div class="floadl" style="width: 30%"><b>Người đề nghị thanh toán<br>(ký, họ tên )<br><br><br><br><br><br><?= $model->user?></b></div>
              <div class="floadl" style="width: 40%"><b>Kế toán trưởng<br>(ký, họ tên )<br><br><br><br><br><br>Phạm Minh Thắng</b></div>
               <div class="floadl" style="width: 30%"><b>Thủ trưởng đơn vị<br>(ký, họ tên )</b</div>
        
          </div>
 
