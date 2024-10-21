<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\totrinh\models\totrinh */

$this->title = Yii::t('app', 'Create Totrinh');
 
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Totrinh'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="totrinh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'MaxNumberThisYear'=>$MaxNumberThisYear
    ]) ?>

</div>
