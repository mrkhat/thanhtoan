<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Test */

$this->title = Yii::t('app', 'Create Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
