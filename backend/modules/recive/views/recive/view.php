<?php

use yii\helpers\Html;
 use yii\helpers\Url;
 use common\components\Utils;
 
use backend\modules\project\models\Project;

/* @var $this yii\web\View */
/* @var $model backend\modules\recive\models\recive */
 
?>
<div class="recive-view">
 <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Lý do thu:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7 text-light-blue"><strong><?=$model->name ?></strong></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ngày thu:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->created ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Người thu:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->receiver ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Số tiền:</label>
                      <div class="col-sm-9">
                             <span class="floatL marT7"><strong><?=number_format($model->money)?> vnđ</strong></span>
 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Dự án:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->project?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Giai đoạn:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7">Giai đoạn <?=$model->step?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Nhận từ ai:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->deliver?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Ghi chú:</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->note?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Giấy nhận tiền:</label>
                      <div class="col-sm-3">
                          <button class="btn btn-block btn-default btn-sm" <?=$model->attach==null ?'disabled' : ''?>><?= $model->attach==null ?'Chưa upload file' :Html::a('<i class="fa fa-download"></i>Tải file',Utils::loadImage('phieuthu/'.$model->attach),['target'=>'_blank','class' => 'linksWithTarget']); ?></button>    
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                     <button onclick="window.location.href='<?= Url::to(['recive/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
                  </div><!-- /.box-footer -->
                </form>
</div>