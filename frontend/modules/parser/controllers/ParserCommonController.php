<?php

namespace app\modules\parser\controllers;


use app\modules\parser\models\Parser;
use app\modules\parser\models\SaveItems;
use phpQuery;
use GuzzleHttp\Client;
use yii\web\Controller; // подключаем Guzzle

class ParserCommonController extends Controller
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
            'host' => 'https://residentname.ru/regions.html',

            'forCategory' => [
                'listItems' => '.table-flow',
                'itemBlock' => '.table-condensed tr',
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


        $resCache = \Yii::$app->cache;
        $items = $resCache->get('resParser');


        echo "<pre>"; print_r($parser->getItems($config));die();
        
        
        if (empty($items)) {
            $forCache = $parser->getItemsInCategory("catalog/massazhnye-kresla");
            $resCache->set('resParser', $forCache);
        }


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