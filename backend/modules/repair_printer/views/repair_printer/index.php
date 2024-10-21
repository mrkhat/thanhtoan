<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\repair_printer\models\Repair_printerSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Repair Printers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-printer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create Repair Printer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
                  
            'loaimay',
            'noidungsuachua',
            'printerkey',
            'serrial',
            // 'SL',
            'room',
            // 'note',
            'Ngay',
        [
  'class' => 'yii\grid\ActionColumn',
  'template' => '{view} {update} {made}',
  'buttons'=> [
    'made' => function () {     
      return Html::button('<span class="glyphicon glyphicon-ok"></span>', [
        'title' => Yii::t('yii', 'made'),
      ]);                                
    }
  ]],
        ],
    ]); ?>
</div>
