<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\modules\dntt\models\dntt */
 use common\components\Utils;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dntts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <form class="form-horizontal">
                  <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'user',
            ['attribute' => 'money', 'format'=>['decimal', 0],],
            'date_of_payment',            
            
             
            'proposal',
            'note',
//              ['attribute' => 'attach',
//                   'format' => 'html',
//                  'value' => function ($data) {
//         $attach= Json::decode($data->attach);
//                          $html='';
//                                  if(count($attach)){
//                                      foreach ($attach as $item) { 
//                                          $extension= explode(".",$item)[1];
//        if (in_array($extension,["jpg","png"])) {
//          $html.= Html::a(Html::img(Utils::loadImage('hopdong/'.$item ),["width"=>'300px']),Utils::loadImage('hopdong/'.$item),['target'=>'_blank','class' => 'linksWithTarget']); 
//                                      }else{
//                                     $html.     Html::a('<i class="fa fa-download"></i>Tải file',Utils::loadImage('hopdong/'.$item),['target'=>'_blank','class' => 'linksWithTarget']);
//                                  } } } else{
//                                       $html=' <button class="btn btn-block btn-default btn-sm" disabled >Chưa upload file</button>';
//                                      }
//                
//             return $html; },
//                  ],
        ],
    ]) ?>
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
</div>
    </form>
</div>