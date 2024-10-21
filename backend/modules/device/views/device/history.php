<?php

use yii\helpers\Html;
 
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */
//
 
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
 
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
     
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
       
              
           
            'name','item',
              
             
            
            'room',
       
             'note',
            // 'device_id',
            // 'created',
            // 'created_by',
            // 'modified_by',
             'date',

     
        ],
    ]); ?>
    </p>

     

</div>
