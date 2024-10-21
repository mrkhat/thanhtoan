<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\Utils;

/* @var $this yii\web\View */
/* @var $model backend\modules\customer\models\customer */
 
?>
<div class="partner-view">
 <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên khách hàng:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-light-blue"><strong><?=$model->name?></strong></span>    
                      </div>
                    </div>
                      <?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Điện thoại:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->phone?></span>    
                      </div>
                    </div>
<?php }?>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Địa chỉ:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->address?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Email:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->email?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ngày sinh:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->birthday?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ghi chú:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->note?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Trạng thái:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-green"><?=$model->activate==1?"Kích Hoạt":"Không Kích Hoạt"?></span>    
                      </div>
                    </div>
            
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                    <?php if($user_role==20||$user_role==30){?> 
                    <button onclick="window.location.href='<?= Url::to(['customer/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
                    <?php }?>
                  </div><!-- /.box-footer -->
                </form>
    </div>