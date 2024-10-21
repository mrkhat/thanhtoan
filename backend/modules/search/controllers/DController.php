<?php

namespace backend\modules\search\controllers;

use yii\web\Controller;

/**
 * Default controller for the `search` module
 */
class DController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {exit();
        return $this->render('index');
    }
}
