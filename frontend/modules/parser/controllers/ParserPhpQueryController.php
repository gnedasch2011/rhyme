<?php

namespace app\modules\parser\controllers;


use app\models\residentname\CaseCityzen;
use app\models\residentname\Cases;
use app\models\residentname\City;
use app\models\residentname\CityDeclinesNouns;
use app\models\residentname\Country;
use app\models\residentname\CountryDeclinesNouns;
use app\models\residentname\DeclinedNouns;
use app\models\residentname\DeclinesNounsValue;
use app\models\residentname\NounseValue;
use app\models\residentname\Url;
use app\modules\parser\models\FileHelper;
use app\modules\parser\models\Parser;
use app\modules\parser\models\SaveItems;
use phpQuery;
use GuzzleHttp\Client;
use yii\helpers\Inflector;
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
            'host' => 'https://residentname.ru',
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

//        $country_declines_nouns = CityDeclinesNouns::find()->all();

//           $countrys = Country::find()
//            ->select('c.*')
//            ->from('country c')
//            ->joinWith('nounseValueCountry')
//            ->all();

        $citys = City::find()
            ->joinWith('nounseValueCountry')
//            ->limit(10)
            ->all();


             
        foreach ($citys as $country) {
            $nameItem = (isset($country->nounseValueCountry[0]->value)) ? $country->nounseValueCountry[0]->value : $country->name;
            echo '<pre>';print_r($nameItem);
            $newUrl = new Url();
            $newUrl->url = Inflector::slug('zhiteli-' . $nameItem);
            $newUrl->param = $country->id;
            $newUrl->route = 'city';

            if(!$newUrl->save()){
                echo "<pre>"; print_r($newUrl->errors);die();
            }
        }

        print_r('end');
        die();
        /*
          left join nounse_value nv on nv.item_id = c.id
where nv.kinds_of_nouns_id = 1 and nv.cases_id =2 and nv.declines_nouns_id =1
*/

//        foreach ($country_declines_nouns as $country_declines_noun) {
//            $new_nounse_value = new NounseValue();
//            $new_nounse_value->attributes = $country_declines_noun->attributes;
//            $new_nounse_value->item_id = $country_declines_noun->city_id;
//            $new_nounse_value->kinds_of_nouns_id = 2;
//            $new_nounse_value->save();
//        }

        echo "<pre>";
        print_r('end');
        die();


//        echo "<pre>"; print_r(Inflector::slug('жители хабаровска'));die();
        //из файла


        $cache = \Yii::$app->cache;

        $key = $config['host'] . $config['uri'];

        $countrys = Country::find()
//            ->where(['id' => 4])
            ->all();

        echo "<pre>";
        print_r($countrys);
        die();

        $declinedNouns = DeclinedNouns::find()->asArray()->all();

        $arrayDeclinedNounNumberTd = [
            'Country' => 2,
            'Man' => 4,
            'Woman' => 5,
            'Residents' => 6,
        ];


        $citys = City::find()
            ->where(['>', 'id', 698])
            ->asArray()
            ->all();


        foreach ($citys as $city) {

            $parser = new Parser($config);
            $parser->host = $config['host'];
            $parser->uri = $city['link'];

            $doc = $parser->initPHPQ();
            $getItems = $doc->find('.table-inflect tr');
            $count = 0;
            foreach ($getItems as $getItem) {
                $getItemPq = pq($getItem);

                if ($count != 0) {
                    foreach ($declinedNouns as $declinedNoun) {

                        $cityDeclinesNouns = new CityDeclinesNouns();

                        $cityDeclinesNouns->city_id = $city['id'];
                        $cityDeclinesNouns->declines_nouns_id = $declinedNoun['id'];

                        $caseId = $this->returnIdCase($getItemPq->find('td:eq(0)')->text());

                        $cityDeclinesNouns->cases_id = $caseId;

                        if ($caseId == false) {
                            continue;
                        }

                        $td_number = $arrayDeclinedNounNumberTd[$declinedNoun['name']];
                        $cityDeclinesNouns->value = $getItemPq->find("td:eq({$td_number})")->text();


                        if (!$cityDeclinesNouns->save()) {
                            echo "<pre>";
                            print_r($cityDeclinesNouns->errors);
                            die();
                        }

                    }

                }

                $count++;
            }

        }
        die('end');


//        foreach ($countrys as $country) {
//            $parser = new Parser($config);
//            $parser->host = $config['host'];
//            $parser->uri = $country->link;
//
//            $doc = $parser->initPHPQ();
//            $getItems = $doc->find('.table-condensed tr');
//
//            $count = 0;
//
//            foreach ($getItems as $getItem) {
//
//                $getItemPq = pq($getItem);
//
//                if ($count != 0) {
//
//                    $city = new City();
//
//                    $city->link = $getItemPq->find('td:eq(0) a')->attr('href');
//                    $city->name = $getItemPq->find('td:eq(0) a')->text();
//
//
////                            $city->index_name = trim($getItemPq->find('td:eq(1)')->text());
////                            $city->img = FileHelper::saveRemoteImage($config['host'] . $getItemPq->find('td:eq(1) img')->attr('src'), 'images/residentname/flags');
//
//                    $city->country_id = $country['id'];
//                    $city->man = $getItemPq->find('td:eq(1)')->text();
//                    $city->woman = $getItemPq->find('td:eq(2)')->text();
//                    $city->townspeople = $getItemPq->find('td:eq(3)')->text();
//
//                    $city->save();
//
//                }
//
//                $count++;
//            }
//
//        }
        die('end');


//        foreach ($getItems as $getItem) {
//            $getItemPq = pq($getItem);
//
//            if ($count != 0) {
//                $city = new City();
//
//                $city->link = $getItemPq->find('td:eq(2) a')->attr('href');
//                $1city->name = $getItemPq->find('td:eq(2) a')->text();
//                $city->index_name = trim($getItemPq->find('td:eq(1)')->text());
//
//                $city->img = FileHelper::saveRemoteImage($config['host'] . $getItemPq->find('td:eq(1) img')->attr('src'), 'images/residentname/flags');
//
//                $city->man = $getItemPq->find('td:eq(3)')->text();
//                $city->woman = $getItemPq->find('td:eq(4)')->text();
//                $city->townspeople = $getItemPq->find('td:eq(5)')->text();
//                $city->save();
//            }
//
//            $count++;
//        }

    }


    public
    function returnIdCase($name_rus)
    {
        $cases = Cases::find()->asArray()->all();

        foreach ($cases as $case) {
            if ($name_rus == $case['name_rus']) {
                return $case['id'];
            }
        }

        return false;
    }


}