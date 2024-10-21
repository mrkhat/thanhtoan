<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\printer\models\printer */

$this->title = Yii::t('app', 'Create Printer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Printers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
