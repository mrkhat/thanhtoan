<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
                 [

            'attribute' => 'id_loai_vb',
            'value' => function ($model, $key) {
                return \Yii::$app->params['type_vb'][$model->id_loai_vb];
            }
        ],
//            'status',
            'sohieu',
            [ 'attribute' => 'so_vb_den',
            'value' => function ($model, $key ) {
                return \Yii::$app->params['type_vb_code'][$model->id_loai_vb] . "/" . $model->so_vb_den;
            }
        ],
              ['attribute' =>'ngay_den',
//              'format' => ['date', 'php:d/m/Y']
                  ],
             ['attribute' =>'ngay_ky',
//              'format' => ['date', 'php:d/m/Y']
              ],
             ['attribute' =>'dieline',
//              'format' => ['date', 'php:d/m/Y']
                 ],
//            'so_vb_di',
//            'ngay_di',
        
            
            'trich_yeu:ntext',
            'noi_dung:ntext',
              
            
             
        ],
    ]); ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
