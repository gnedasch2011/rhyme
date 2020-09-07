<?php

namespace app\modules\sitemap\controllers;

use Yii;
use frontend\modules\url\model\HelperUrl;
use yii\web\Controller;

/**
 * Default controller for the `tests` module
 */
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

        $urls = [];

        $arrUrls = HelperUrl::getAllUrls();

        $limit = 20;

        $countPage = ceil(count($arrUrls) / $limit);

        if ($countPage > 1) {

            return $this->render('many_sitemap', [
                'arrUrls' => $arrUrls,
                'countPage' => $countPage,
            ]);
        }


        //получется если меньше 50 000, то обычный, если нет, то с ссылками на лимитированные

        foreach ($arrUrls as $url) {
            $urls[] = array(
                'loc' => $url->url,
                'changefreq' => 'weekly',
                'priority' => 0.9,
            );
        }

        $urls = array_merge([
            [
                'loc' => '',
                'changefreq' => 'weekly',
                'priority' => 1,
            ]
        ], $urls);


        if (!$xml_sitemap = Yii::$app->cache->get('sitemap')) {
            $xml_sitemap = $this->renderPartial('sitemap', array(
                'host' => \Yii::$app->request->hostInfo,
                'urls' => $urls,
            ));
            Yii::$app->cache->set('sitemap', $xml_sitemap, 60 * 60 * 12); // кэшируем результат на 12 ч
        }

        //50 000


        return $xml_sitemap;
    }

}

