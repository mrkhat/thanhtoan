<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Luotkhamtrongngay */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Luotkhamtrongngay',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Luotkhamtrongngays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="luotkhamtrongngay-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
