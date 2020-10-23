<?php

namespace app\modules\items\controllers;

use frontend\modules\items\model\Items;
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

    public function actionDetail($name_transliteration, $id)
    {
        $model = Items::findOne(['id' => $id]);

        $this->view->params['breadcrumbs'][] = array(
            'label' => $model->category->name,
            'url' => '/' . $model->category->getUrl(),
        );

        $this->view->title = $model->getFullTitleName() . "| Про-Загадки.РУ";
        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => $model->getFullTitleName() . "| Про-Загадки.РУ"]
        );


        $this->view->params['breadcrumbs'][] = array(
            'label' => mb_substr($model->clearTitle($model->qustion), 0, 30) . '...',
        );

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}

