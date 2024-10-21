<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\repair_printer\models\repair_printer */

$this->title = Yii::t('app', 'Create Repair Printer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Printers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-printer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
