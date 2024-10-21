<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemType */

$this->title = Yii::t('app', 'Tạo mới loại thiết bị');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'nhóm thiết bị'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
