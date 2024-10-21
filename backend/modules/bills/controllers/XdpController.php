<?php

 
namespace backend\modules\bills\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\bills\models\Xdp;
use backend\modules\bills\models\Bills;
use backend\modules\bills\models\SearchXdp;
use yii\web\Controller;
 
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use yii\data\ActiveDataProvider;
/**
 * XdpController implements the CRUD actions for Xdp model.
 */
class XdpController extends Controller
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
     * Lists all Xdp models.
     * @return mixed
     */
    public function actionIndex()
    {
                $searchModel = new SearchXdp();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Xdp model.
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
     * Creates a new Xdp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */ 

    /**
     * Updates an existing Xdp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing Xdp model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Xdp model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Xdp the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
    protected function findModel($id)
    {
        if (($model = Xdp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
