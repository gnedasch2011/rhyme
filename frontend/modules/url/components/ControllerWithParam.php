<?php

namespace frontend\modules\url\components;
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 17.09.2020
 * Time: 11:33
 */
class ControllerWithParam extends \yii\web\Controller
{
    /**
     * Устанавливает параметры страница
     * мета теги и переменную isLanding
     * @param $model - объект класса Url или модель содержищая связь Url (страница, товар или катеория)
     */
    public function setPageParams($model)
    {
        $url = null;
        if ($model instanceof Url) {
            $url = $model;
        } elseif (isset($model->url)) {
            $url = $model->url;
        }
       
        if ($url) {
            $this->view->title = $url->title;
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => $url->keywords]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => $url->description]);

        }   

        return;
    }
}