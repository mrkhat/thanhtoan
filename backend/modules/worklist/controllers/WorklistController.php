<?php

namespace backend\modules\worklist\controllers;

use Yii;
use yii\filters\AccessControl;
use common\components\AccessRule;
use backend\modules\worklist\models\WorkList;
use backend\modules\worklist\models\SearchWorkList;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * WorkListController implements the CRUD actions for WorkList model.
 */
class WorklistController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ], 'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'update', 'delete', 'create', 'view', 'updateax', 'status'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['delete', 'update', 'updateax', 'status'],
                        'roles' => [20, 30],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'view'],
                        'roles' => ['@'],
                    ],
                ],]
        ];
    }

    /**
     * Lists all WorkList models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SearchWorkList();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
 public function actionListfile() {
    

        return $this->render('listfile', [
                   
        ]);
    }
    public function actionStatus($id) {
        $model = $this->findModel($id);
      
        $model->status = $model->status == 1 ? 0 : 1;
      
 $model->save() ;
    
 
    }

    /**
     * Displays a single WorkList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->renderAjax('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new WorkList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new WorkList();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'attach');
            if (!is_null($file)) {
                $orgName = time();
                $imageDir = \Yii::getAlias('@webroot') . '/' . Yii::$app->params['assets-path'] . 'images/' . 'worklist' . '/';
                $filename = 'worklist' . $orgName . '.' . $file->extension;
                $saveStatus = $file->saveAs($imageDir . $filename);
                if ($saveStatus) {
                    $model->attach = $filename;
                }
            }

            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WorkList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateax($id) {
        $model = $this->findModel($id);

        $attach = $model->attach;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'attach');
            if (!is_null($file)) {
                $orgName = time();
                $imageDir = \Yii::getAlias('@webroot') . '/' . Yii::$app->params['assets-path'] . 'images/' . 'worklist' . '/';
                $filename = 'worklist' . $orgName . '.' . $file->extension;
                $saveStatus = $file->saveAs($imageDir . $filename);
                if ($saveStatus) {
                    $model->attach = $filename;
                    @unlink(Yii::$app->params['assets-path'] . 'images/' . 'worklist' . '/' . $attach);
                }
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $attach = $model->attach;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'attach');
            if (!is_null($file)) {
                $orgName = time();
                $imageDir = \Yii::getAlias('@webroot') . '/' . Yii::$app->params['assets-path'] . 'images/' . 'worklist' . '/';
                $filename = 'worklist' . $orgName . '.' . $file->extension;
                $saveStatus = $file->saveAs($imageDir . $filename);
                if ($saveStatus) {
                    $model->attach = $filename;
                    @unlink(Yii::$app->params['assets-path'] . 'images/' . 'worklist' . '/' . $attach);
                }
            }

            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WorkList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
