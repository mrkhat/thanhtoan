<?php

namespace backend\modules\tscd\controllers;

use yii\web\Controller;

/**
 * Default controller for the `tscd` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
