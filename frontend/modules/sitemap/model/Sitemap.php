<?php

namespace frontend\modules\sitemap\model;

use frontend\modules\url\model\HelperUrl;

/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 08.09.2020
 * Time: 10:21
 */
class Sitemap extends \yii\base\Model
{

    public function getUrl()
    {
        $urls = array();

        //Получаем массив URL из таблицы Sef
        $url_rules = HelperUrl::getAllUrls();

        foreach ($url_rules as $url_rule) {
            $urls[] = array($url_rule, 'daily');
        }

        return $urls;
    }




    public function getXml($urls)
    {
        $host = Yii::$app->request->hostInfo; // домен сайта
        ob_start();
        echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <url>
                <loc><?= $host ?></loc>
                <changefreq>daily</changefreq>
                <priority>1</priority>
            </url>
            <?php foreach ($urls as $url): ?>
                <url>
                    <loc><?= $host . $url[0] ?></loc>
                    <changefreq><?= $url[1] ?></changefreq>
                </url>
            <?php endforeach; ?>
        </urlset>
        <?php return ob_get_clean();
    }

    public function showXml($xml_sitemap)
    {
        // устанавливаем формат отдачи контента
        Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        //повторно т.к. может не сработать
        header("Content-type: text/xml");
        echo $xml_sitemap;
        \Yii::$app->end();
    }

}