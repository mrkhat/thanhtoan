<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\totrinh\models\TotrinhSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Totrinh');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="totrinh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Totrinh'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'number',
            'year',
            'title:ntext',
            'note:ntext',
//            'created_by',
            // 'created',
            // 'modified_by',
            // 'modified',
             'date_display',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
