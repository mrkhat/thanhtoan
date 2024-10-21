<?php

namespace backend\modules\items\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\items\models\Items;
use backend\modules\items\models\ItemInformation;
use backend\modules\items\models\SearchItems;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
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
                   
                'only' => ['index','list', 'update', 'delete','create','view'],
                'rules' => [
                      [
                        'allow' => true,
                        'actions' => ['delete',],
                        'roles' => [30],
                    ],
                      [
                        'allow' => true,
                        'actions' => ['index','update','create'],
                        'roles' => [20,30],
                    ],
                     [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['@'],
                    ],
                  
                  
                ],
        ]
        ];
        
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchItems();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     */
    public function actionList($q = null, $id = null,$g){
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'name' => '']];
    if (!is_null($q)) {
 
        $data = (new \yii\db\Query())->select(['id',"name","unit"])->from('item_information')->andFilterWhere(['like', 'name',$q])->andFilterWhere(['status'=>1])->limit(20)->all();
//      echo $data->createCommand()->getRawSql()."<br>";
//        var_dump($data);
        $out['results'] =array_values(ArrayHelper::toArray($data));
    }
    elseif ($id > 0) {
 
    
        $out['results'] = (['id' => $id, 'name' => Items::find($id)->one()->name]);
    }
    return $out;
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Items();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Items model.
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
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
