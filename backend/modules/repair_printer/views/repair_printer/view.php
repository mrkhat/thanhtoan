<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\repair_printer\models\repair_printer;
/* @var $this yii\web\View */
/* @var $model backend\modules\repair_printer\models\repair_printer */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Printers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-printer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
      
    </p>
<?php $totalrepare= $model->printerkey==""?0:count(repair_printer::findAll([ 'printerkey'=> $model->printerkey]));?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            
            'Ngay',
            'loaimay',
            'noidungsuachua',
            'printerkey',
            [ 'attribute' => 'Số lần sửa chữa','format' => 'raw',
                'value' => $totalrepare
           
      
          ],
            
            'serrial',
            'SL',
            'room',
            'note',
        ],
    ]) ?>

</div>
