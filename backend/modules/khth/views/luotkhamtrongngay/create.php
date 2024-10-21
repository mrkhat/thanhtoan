<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\khth\models\Luotkhamtrongngay */

$this->title = Yii::t('app', 'Create Luotkhamtrongngay');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Luotkhamtrongngays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="luotkhamtrongngay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
