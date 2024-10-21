<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\device\models\Device */

$this->title = $model->type.$model->key;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
//            'name',
            'id',
            'type',
            'key',
            'model' ,
            'serrial',
            'configuration:ntext',
            
            \Yii::$app->user->identity->role > 20 ? 'note,price:decimal':'note',
        
        ],
    ]) ?>

</div>
