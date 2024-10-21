<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\users */

$this->title = 'Thành viên quản trị';
 $this->params['breadcrumbs'][] = ['label' => 'Thành viên quản trị', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Cập nhật mới thành viên';
?>
<section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                             <h3 class="box-title">Cập nhật thành viên</h3>
    

   
                            </div>
                             <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>
                </div>
</section>