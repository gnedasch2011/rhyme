<?php

namespace app\modules\sitemap\controllers;

use Yii;
use frontend\modules\url\model\HelperUrl;
use yii\web\Controller;


class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');


        $countPage = HelperUrl::getCountPage();

        if ($countPage > 1) {

            return $this->renderPartial('many_sitemap', [
                'countPage' => $countPage,
            ]);
        }

        $arrUrls = HelperUrl::getAllUrls();

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');

        return $this->renderPartial('sitemap', [
            'array_urls' => $arrUrls,
        ]);

    }

    public function actionSitemap($index)
    {

        $arrUrls = HelperUrl::getAllUrls();
        $limit = HelperUrl::LIMIT_CONST;

        $countUrls = count($arrUrls);

        $array_urls = array_slice($arrUrls, $limit * $index, $limit);

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');

        return $this->renderPartial('sitemap', [
            'array_urls' => $array_urls,
        ]);

    }

}

