<?php

namespace frontend\modules\tasks\controllers;

use yii\web\Controller;

/**
 * Default controller for the `tasks` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id)
    {


        //user, и таску
        return $this->render('index');
    }   
    
    public function actionIndex2()
    {
        return $this->render('index');
    }
}
