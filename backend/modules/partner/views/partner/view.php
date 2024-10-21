<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
 use common\components\Utils;
/* @var $this yii\web\View */
/* @var $model backend\modules\project\models\project */

 
?>
<div class="partner-view">

  <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên đối tác:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-light-blue"><strong><?=$model->name?></strong></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Người liên hệ:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->contact?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Chức vụ:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->position?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Điện thoại:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->phone?></span>    
                      </div>
                    </div>
                          <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Địa Chỉ:</label>
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
                      <label for="inputEmail3" class="col-sm-3 control-label">Chiết khấu</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-green"><?=$model->discount?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Báo giá</label>
                       <div class="col-sm-3">
                          <button class="btn btn-block btn-default btn-sm" <?=$model->attach==null ?'disabled' : ''?>><?= $model->attach=='' ?'Chưa upload file' :Html::a('<i class="fa fa-download"></i>Tải file',Utils::loadImage('baogia/'.$model->attach),['target'=>'_blank','class' => 'linksWithTarget']); ?></button>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ghi chú:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->note?></span>    
                      </div>
                    </div>
                  </div><!-- /.box-body -->
 </form>                 
</div>

<div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                    
                    <button onclick="window.location.href='<?= Url::to(['partner/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
                  </div><!-- /.box-footer -->
                   