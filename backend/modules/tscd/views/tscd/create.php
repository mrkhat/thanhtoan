<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\tscd\models\Tscd */

$this->title = Yii::t('app', 'Create Tscd');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tscds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tscd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
