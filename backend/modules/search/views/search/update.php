<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\search\models\search */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Search',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Searches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="search-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
