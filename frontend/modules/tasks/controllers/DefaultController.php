<?php

namespace frontend\modules\tasks\controllers;

use frontend\modules\tasks\models\Tasks;
use yii\debug\controllers\UserController;
use yii\web\Controller;

/**
 * Default controller for the `tasks` module
 */
class DefaultController extends UsersController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id)
    {
        $task = Tasks::findOne($id);

        return $this->render('index', [
            'task' => $task,
        ]);
    }

    public function actionIndex2()
    {
        return $this->render('index');
    }
}
