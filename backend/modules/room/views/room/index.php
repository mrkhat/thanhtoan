<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\room\models\SearchRoom */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'name',
            'lever',
            [ 'attribute'=>'status','filter'=>array("1"=>"Kích Hoạt","0"=>"Tạm Dừng")], 
            'note',
             'suggest',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',],
        ],
    ]); ?>
</div>
