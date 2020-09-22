<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 15.09.2020
 * Time: 17:45
 */

namespace frontend\controllers;


use frontend\models\form\AddArticle;
use yii\base\Controller;

class AdminController extends Controller
{
    public function actionAddArticle()
    {
        $AddArticle = new AddArticle();


        return $this->render('addArticle', [
            'AddArticle' => $AddArticle,
        ]);
    }
}
