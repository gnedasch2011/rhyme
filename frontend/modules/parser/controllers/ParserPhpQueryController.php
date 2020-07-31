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
            'host' => 'http://yamaguchi.loc/',
            'uri' => 'massazhery-dlya-nog',

            'forCategory' => [
                'listItems' => '.listing-narrow',
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

        $parser = new Parser($config);


       $getItems = $parser->getItems((object)$config);


//        if (empty($items)) {
//            $forCache = $parser->getItemsInCategory("catalog/massazhnye-kresla");
//            $resCache->set('resParser', $forCache);
//        }

        echo "<pre>"; print_r($getItems);die();

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