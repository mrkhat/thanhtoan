<?php
use yii\helpers\Html;
 use common\components\Utils;
Yii::$app->name = 'QUẢN LÝ THIẾT BỊ CNTT';
/* @var $this \yii\web\View */
/* @var $content string */

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">QUẢN LÝ THIẾT BỊ CNTT</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                
                  <?php $avata =\Yii::$app->user->identity->attach;
                        $avata = is_null($avata)?'noimage.jpg':$avata;
                        ?>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?=Utils::loadImage('avata/'.$avata)?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo trim(\Yii::$app->user->identity->first_name);?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                        
                <img src="<?=Utils::loadImage('avata/'.$avata)?>" class="img-circle" alt="User Image"/>

                            <p> 
                                <?php echo trim(\Yii::$app->user->identity->first_name);?>
                                <small><?= trim(Yii::$app->params['position'][\Yii::$app->user->identity->last_name])?> </small>
                            </p>
                        </li>                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Profile',
                                    ['/users/update?id='.\Yii::$app->user->identity->id],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>               
            </ul>
        </div>
    </nav>
</header>
