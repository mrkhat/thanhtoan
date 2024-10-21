<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\repair_printer\models\repair_printer */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Repair Printer',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Printers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="repair-printer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
