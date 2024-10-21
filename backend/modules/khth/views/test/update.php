<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Test */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Test',
]) . $model->it;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->it, 'url' => ['view', 'id' => $model->it]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
