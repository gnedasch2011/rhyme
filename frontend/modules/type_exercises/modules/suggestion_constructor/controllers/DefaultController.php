<?php

namespace frontend\modules\type_exercises\modules\suggestion_constructor\controllers;

use yii\web\Controller;

/**
 * Default controller for the `type_exercises` module
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
