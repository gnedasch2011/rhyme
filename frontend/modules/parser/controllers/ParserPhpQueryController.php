<?php

namespace app\modules\parser\controllers;


use app\modules\parser\models\Parser;
use app\modules\parser\models\SaveItems;
use phpQuery;
use GuzzleHttp\Client;
use yii\web\Controller; // подключаем Guzzle

class ParserPhpQueryController extends Controller
{

    const DIR_IMG_PRODUCT = "/web/images/products/";
    const DIR_FILES_PRODUCT = "/web/files/products/";

    /**
     * Главное действо
     * @return string
     */
    public function actionIndex()
    {

        $config = [
            'host' => 'https://residentname.ru/',
            'uri' => 'regions.html',

            'forCategory' => [
                'listItems' => '.table-condensed',
                'itemBlock' => 'tr',
            ],

            'forDetail' => [
                'name' => 'h1',
                'model' => '.bread__item:eq(3)',
                'price' => '.price:eq(0)',
                'priceAction' => '.old_price',
                'brand' => '.product_brand a',
                'imgMain' => [
                    'href' => '.product_image a'
                ],
                'attr' => [
                    'tableSelector' => '.features',
                    'rowSelector' => 'li',
                ],

            ],
        ];


        $config = [
            'host' => 'https://residentname.ru/',
            'uri' => 'countries.html',

            'forCategory' => [
                'listItems' => '.table-condensed',
                'itemBlock' => '.product-sm',
            ],

            'forDetail' => [
                'name' => 'h1',
                'model' => '.bread__item:eq(3)',
                'price' => '.price:eq(0)',
                'priceAction' => '.old_price',
                'brand' => '.product_brand a',
                'imgMain' => [
                    'href' => '.product_image a'
                ],
                'attr' => [
                    'tableSelector' => '.features',
                    'rowSelector' => 'li',
                ],

            ],
        ];

        //из файла

        $parser = new Parser($config);

        $parser->host = $config['host'];
        $parser->uri = $config['uri'];

        $doc = $parser->initPHPQ();

        $getItems = $doc->find('.table-condensed tr');

        $count = 0;

        foreach ($getItems as $getItem) {

            $getItemPq = pq($getItem);
            echo '<pre>';print_r($getItemPq->find('td:eq(1)')->text());
            $count++;
            echo $count;
        }

        die('end');
        $getItems = $parser->getItems((object)$config);
        echo "<pre>";
        print_r($getItems);
        die();
        //test

//        if (empty($items)) {
//            $forCache = $parser->getItemsInCategory("catalog/massazhnye-kresla");
//            $resCache->set('resParser', $forCache);
//        }

        echo "<pre>";
        print_r($getItems);
        die();

        $saveItem = new SaveItems();


        //детальная страница
//        $parser->uri = "/categories/jet/";
//        $parser->getDetailItem($config);


        foreach ($items as $item) {
            if ($saveItem::saveItem($item, $parser->host)) {
                continue;
            } else {
                echo $saveItem::saveItem($item, $parser->host);
            }
        }

    }

}