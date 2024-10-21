<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\Xdp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xdps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xdp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'key',
            'type',
            'itemid',
            'number',
            'groupid',
            'roomid',
            'note:ntext',
            'deliver',
            'receiver',
            'created_date',
            'display_date',
            'status',
            'status1',
            'status2',
            'note2',
            'source',
            'roomname',
            'item',
            'unit',
            'groupname',
            'serial',
            'price',
            'itemtype',
            'devicekey',
            'itop2',
            'itop1',
        ],
    ]) ?>

</div>
