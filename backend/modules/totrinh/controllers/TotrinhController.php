<?php

namespace backend\modules\totrinh\controllers;

use Yii;

use backend\modules\totrinh\models\Totrinh;
use backend\modules\totrinh\models\TotrinhSreach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\filters\VerbFilter;

/**
 * TotrinhController implements the CRUD actions for totrinh model.
 */
class TotrinhController extends Controller
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
            ],'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   
                'only' => ['index', 'update', 'delete','create','view','print','edititems','print'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','update','create','view','edititems','print'],
                        'roles' => ['@'],
                    ],
                
           
                ],
        ]
        ];
        
    }

    /**
     * Lists all totrinh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TotrinhSreach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single totrinh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new totrinh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new totrinh();
      $MaxNumberThisYear=$model->find()->where(['YEAR'=>date("Y")])->max('`NUMBER`');
 
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'MaxNumberThisYear'=>$MaxNumberThisYear +1
            ]);
        }
    }

    /**
     * Updates an existing totrinh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing totrinh model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the totrinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return totrinh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = totrinh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
