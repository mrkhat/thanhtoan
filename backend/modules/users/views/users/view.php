<?php

use yii\helpers\Html;
 use yii\helpers\Url;
use backend\modules\users\models\UserTypes;
 use common\components\Utils;
/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\users */
 
?>
<div class="users-view">

   <form class="form-horizontal">
                  <div class="box-body">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= is_null($model->attach)?Utils::loadImage('avata/noimage.jpg'):Utils::loadImage('avata/'.$model->attach)?>" alt="User profile picture">
                        <h3 class="profile-username text-center text-light-blue"><?=$model->first_name?></h3>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Vị trí</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=Yii::$app->params['position'][$model->last_name]?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?=$model->email?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Mật khẩu</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7">*********</span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Điện thoại</label>
                   
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Quyền quản trị</label>
                      <div class="col-sm-9">
                          <span class="floatL marT7"><?= UserTypes::findOne(['id' => $model->role])->type ?></span>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Trạng thái</label>
                      <div class="col-sm-9">
                         <?= $model->status==1?"<span class='floatL marT7  text-green'>Kích hoạt</span>":" <span class='floatL marT7  '>Tạm ngưng</div>"?>
                         
                      </div>
                    </div>
            
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
                  <button onclick="window.location.href='<?= Url::to(['users/update','id'=>$model->id]) ?>'" type="button" class="btn btn-primary pull-right">Chỉnh sửa</button>
                  </div><!-- /.box-footer -->
                </form>
</div>
