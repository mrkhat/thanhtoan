<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\Xdp */

$this->title = Yii::t('app', 'Create Xdp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xdps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xdp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
