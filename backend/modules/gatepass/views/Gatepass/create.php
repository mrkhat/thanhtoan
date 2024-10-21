<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\gatepass\models\Gatepass */

$this->title = Yii::t('app', 'Create Gatepass');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gatepasses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gatepass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
