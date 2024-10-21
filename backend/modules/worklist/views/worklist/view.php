<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\modules\users\models\Users;
 use common\components\Utils;
/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */

 
?>
<div class="partner-view">

  <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên công việc:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-light-blue"><strong><?=$model->name?></strong></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Người chỉ định:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?php $wl = Users::findOne(['id' => $model->user_id]);
                                        if(!is_null($wl)){
                                        echo $wl->first_name; }?></span>    
                      </div>
                    </div>
                     
                    
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ghi chú:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->note?></span>    
                      </div>
                    </div>
                       <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tình trạng:</label>
                        <div class="col-sm-9">
                          <?= $model->urgent == 1? '<small class="label label-danger"><i class="fa fa-clock-o"></i> Gấp</small>':'<small class="label label-success"><i class="fa fa-coffee"></i> </small>'?>
                      </div>
                    </div>
                     
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Trạng thái:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-green"><?=$model->status == 1 ? "Đã hoàn thành" : "Đang thực hiện"?></span>    
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">File đính kèm:</label>
                      <div class="col-sm-3">
                          <button class="btn btn-block btn-default btn-sm" <?=$model->attach==null ?'disabled' : ''?>><?= $model->attach==null ?'Chưa upload file' :Html::a('<i class="fa fa-download"></i>Tải file',Utils::loadImage('worklist/'.$model->attach),['target'=>'_blank','class' => 'linksWithTarget']); ?></button>    
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ngày tạo:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->created?></span>    
                      </div>
                    </div>
                  </div><!-- /.box-body -->
 </form>                 
</div>

<div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                     <?php $user_role=\Yii::$app->user->identity->role;
if($user_role==20||$user_role==30){
?>
                    <button onclick="window.location.href='<?= Url::to(['worklist/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
<?php }?>                  
</div><!-- /.box-footer -->
                   