<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemInformation */

$this->title = Yii::t('app', 'Tạo mới thiết bị');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Thiết bị'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
