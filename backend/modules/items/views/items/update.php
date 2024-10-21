<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemInformation */

$this->title = Yii::t('app', 'Cập nhật thông tin mặt hàng: ', [
    'modelClass' => 'Item Information',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Informations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-information-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
