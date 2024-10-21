<?php
use yii\helpers\Html;
//use common\widgets\GridView;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
   use yii\web\JsExpression;
   use yii\helpers\Url;
?>
<h1>bcxdp/index</h1>
<?php 
$data=Yii::$app->db->createCommand('SELECT id,	item_information.`name`	FROM item_information	WHERE item_information.option2 = 1 and status=1')->queryAll();

$hearder=array( ['content'=>'#', 'options'=>['colspan'=>3, 'class'=>'text-center warning']]);
$row=array( [
    'class'=>'kartik\grid\SerialColumn',
    'contentOptions'=>['class'=>'kartik-sheet-style'],
//    'width'=>'36px',
    'pageSummary'=>'Total',
    'pageSummaryOptions' => ['colspan' => 1],
    'header'=>'',
    'headerOptions'=>['class'=>'kartik-sheet-style'],
  
],[ 'class' => 'kartik\grid\FormulaColumn',
    'attribute'=>'Y',
    
    'group' => true, 
//    'subGroupOf' => 1,
//    
       'groupFooter'=>  function ($model, $key, $index, $widget) { 
           
 $content=array(1 => 'Total '.$model['Y']);
   $data=Yii::$app->db->createCommand('SELECT count(*) as total FROM item_information	WHERE item_information.option2 = 1 and status=1')->queryAll();
 
    for($i=3;$i<$data[0]['total']*3 +3;$i++){
         $content[$i]=GridView::F_SUM;
//          
     }
         
     
    return   [
        'mergeColumns' => [[0,2]], 
        'content' =>  $content,
        'contentFormats' => [      // content reformatting for each summary cell
//            4 => ['format' => 'number', ],
//            5 => ['format' => 'number', ],
//            6 => ['format' => 'number', ],
        ],
        'contentOptions' => [      // content html attributes for each summary cell
        //  'options' => ['class' => 'success table-success h6']
//            4 => ['class' => 'text-center'],
//            5 => ['class' => 'text-right'],
//            6 => ['class' => 'text-right'],
        ],
        'options' => ['class' => 'success table-success h3']
        ];
            },
         ],'M' );
foreach ($data as $k=> $value){
     $row[]= [ 'attribute'=>$value['name'],'label'=>'Xuất','pageSummary'=>true ,'contentOptions' => ['class' => 'danger table-danger h6']];
     $row[]= ['attribute'=>'N '.$value['name'], 'label'=>'Nhập','pageSummary'=>true,  'contentOptions' => ['class' => 'info table-info h6']];
     $row[]= ['attribute'=>'T '.$value['name'],'label'=>'Tồn','pageSummary'=>true,  'contentOptions' => ['class' => 'warning table-warning h6']];  
  $hearder[]=   ['content'=>$value['name'], 'options'=>['colspan'=>3, 'class'=>'text-center warning']];
}
 
?>
<?= GridView::widget([
       'dataProvider' => $dataProvider,
    'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']],
    'filterPosition' => GridView::FILTER_POS_HEADER,
       'showPageSummary' => true,
      'hover' => true,
       'columns' => $row,
'beforeHeader'=>[
        [
            'columns'=>$hearder,
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
        
   ]); ?>

