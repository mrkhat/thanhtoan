<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\bills\models\Bgtbdien */

$this->title = Yii::t('app', 'Tạo phiếu nhập kho dự phòng');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bgtbdiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bgtbdien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
