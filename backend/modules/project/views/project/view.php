<?php

use yii\helpers\Html;
 use common\components\Utils;
use backend\modules\customer\models\Customer;
use yii\helpers\Url;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */
 
?>
<div class="project-view">

    <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên dự án:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-light-blue"><strong><?=$model->name?></strong></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Mã dự án:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7">#<?=$model->id ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ngày tạo:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->created ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên khách hàng:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=Customer::findOne(['id' => $model->customer_id])->name ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tổng thu (vnđ):</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=number_format($model->recive) ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tổng chi (vnđ):</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=number_format($model->payment) ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tổng tiền (vnđ):</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=number_format ($model->money) ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Còn lại (vnđ):</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-red"><?=number_format($model->money - $model->recive) ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Trạng thái:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-green"><?=$model->status == 1 ? "Đã hoàn thành" : "Đang thực hiện"?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ghi chú:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7">
                              <?=$model->note ?>
                          </span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ngày bảo hành:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->guarantee ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Hợp đồng:</label>
                      <div class="col-sm-3">
                          <?php  $attach= Json::decode($model->attach);
                          $html='';
                                  if(count($attach)){
                                      foreach ($attach as $item) { 
                                          $extension= explode(".",$item)[1];  ?>
                                          <?php if (in_array($extension,["jpg","png"])) { ?>
                          
                                     <?=Html::a(Html::img(Utils::loadImage('hopdong/'.$item ),["width"=>'300px']),Utils::loadImage('hopdong/'.$item),['target'=>'_blank','class' => 'linksWithTarget']); ?>
                                          <?php }else{ ?>
                            <?=Html::a('<i class="fa fa-download"></i>Tải file',Utils::loadImage('hopdong/'.$item),['target'=>'_blank','class' => 'linksWithTarget'])?>
                                          <?php }?>
                                   
                                      
                                  <?php }} else{
                                  ?>
                          <button class="btn btn-block btn-default btn-sm" disabled >Chưa upload file</button>
                      <?php }?></div>
                    </div>
            
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                                        <?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?> 
                    <button onclick="window.location.href='<?= Url::to(['project/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
                  <?php }?>  
                  </div><!-- /.box-footer -->
                </form>
</div>
