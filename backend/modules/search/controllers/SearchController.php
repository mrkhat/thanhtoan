<?php

namespace backend\modules\search\controllers;

use Yii;
use backend\modules\search\models\search;
use backend\modules\search\models\SearchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SearchController implements the CRUD actions for search model.
 */
class SearchController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    { 
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all search models.
     * @return mixed
     */
    public function actionIndex()
    { 
        $searchModel = new SearchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     
    protected function findModel($id)
    {
        if (($model = search::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
