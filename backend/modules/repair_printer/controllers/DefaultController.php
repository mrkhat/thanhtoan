<?php

namespace backend\modules\repair_printer\controllers;

use yii\web\Controller;

/**
 * Default controller for the `repair_printer` module
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
