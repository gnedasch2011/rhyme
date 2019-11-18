<?php

namespace frontend\modules\type_exercises\modules\exercises\controllers;

use frontend\components\AdminController;
use frontend\components\ModelLoader;
use Yii;
use frontend\modules\type_exercises\modules\exercises\models\Exercises;
use frontend\modules\type_exercises\modules\exercises\models\ExercisesSearch;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Exercises model.
 */
class DefaultController extends AdminController
{
    /**
     * {@inheritdoc}
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
     * Lists all Exercises models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExercisesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercises model.
     * @param integer $id
     * @param integer $tasks_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $tasks_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $tasks_id),
        ]);
    }

    /**
     * Creates a new Exercises model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exercises();

        if (Yii::$app->request->post()) {
            $models = ModelLoader::createLoadMultipleModel($model, Yii::$app->request->post());

            if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
                foreach ($models as $model) {
                    $model->save();
                }
                return $this->redirect(['view', 'id' => $model->id, 'tasks_id' => $model->tasks_id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Exercises model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $tasks_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $tasks_id)
    {
        $model = $this->findModel($id, $tasks_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'tasks_id' => $model->tasks_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Exercises model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $tasks_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $tasks_id)
    {
        $this->findModel($id, $tasks_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exercises model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $tasks_id
     * @return Exercises the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $tasks_id)
    {
        if (($model = Exercises::findOne(['id' => $id, 'tasks_id' => $tasks_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
