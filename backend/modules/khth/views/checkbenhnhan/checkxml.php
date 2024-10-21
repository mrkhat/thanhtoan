<?php

use yii\helpers\Html;
//use common\widgets\GridView;
use kartik\export\ExportMenu;
use \kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<h1></h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end() ?>
<?php
// window.atob(encoded)
//echo "<pre>".htmlspecialchars( base64_decode)."</pre>";
?>
<p id="demo"></p>

<pre><?php
    if (!is_null($data)) {
//      var_dump(is_null($data));
        ?>
        <?= 'Ngày Lập ' . htmlspecialchars($data->THONGTINHOSO->NGAYLAP) ?></br>
        <?= 'Số Lượng HS ' . htmlspecialchars($data->THONGTINHOSO->SOLUONGHOSO) ?></br>
        <?php $index =0;
        foreach ($data->THONGTINHOSO->DANHSACHHOSO as $HSS) {
            foreach ($HSS as $KEYs => $files) {
                ?>
            <pre>   <?= $KEYs.": ".$index++  ?>
                    <?php foreach ($files as $KEY => $file) { ?>  
                              <pre><?= $KEY ?> <pre> <?= htmlspecialchars($file->LOAIHOSO); ?> </pre>
                            <pre><?= htmlspecialchars(base64_decode($file->NOIDUNGFILE)); ?> </pre>
                        </pre>
                        <?php }
                    ?>
                </pre>
                <?php
            }
        }
    }
    ?></pre>

<div id='data' style="display: none"><?= htmlspecialchars($data) ?></div>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script >

    $(document).ready(function () {
        function myFunction(xml) {
            var xmlDoc = xml.responseXML;
            console.log(xmlDoc);
//    var x = xmlDoc.getElementsByTagName('FILEHOSO');
//    var y = x.childNodes[0];
//    document.getElementById("demo").innerHTML = y.nodeValue;
        }
        var xml = (document.getElementById("data"));
        myFunction(xml);

    });
</script>