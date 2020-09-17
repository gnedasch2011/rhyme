<?php

namespace app\modules\page\controllers;

use frontend\modules\page\model\Page;
use frontend\modules\url\components\ControllerWithParam;
use Yii;
use yii\web\Controller;


class DefaultController extends ControllerWithParam
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionView($param)
    {
        $page = Page::find()->where(['id' => $param])->one();

        $this->setPageParams($page);

        return $this->render('view', [
            'page' => $page,
        ]);
    }


}

