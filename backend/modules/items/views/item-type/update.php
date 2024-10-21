<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemType */

$this->title = Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Cập Nhật loại thiết bị',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Danh mục thiết bị'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
