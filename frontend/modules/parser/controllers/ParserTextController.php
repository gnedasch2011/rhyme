<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.08.2020
 * Time: 11:37
 */

namespace app\modules\parser\controllers;


use app\models\residentname\City;
use app\models\residentname\Country;
use app\models\residentname\CountryInfoForMask;
use app\modules\parser\models\ParserCsv;
use yii\web\Controller;

class ParserTextController extends Controller
{
    public function actionIndex()
    {

        $file = 'csv/custom_extraction_all2.csv';

        (new ParserCsv())->open($file)->parse(function ($data, ParserCsv $csv) {

            $country_info_for_mask = new CountryInfoForMask();

            $country_info_for_mask->country_id = $this->findCountry($data['2-х символьный код']);

            if(!empty($country_info_for_mask->country_id)){
                $country_info_for_mask->part_of_the_world = $data['Часть света'];
                $country_info_for_mask->capital = $data['Столица'];
                $country_info_for_mask->language = $data['Язык'];
                $country_info_for_mask->country_name = $data['Название страны'];
                $country_info_for_mask->character_code_2 = $data['2-х символьный код'];
                $country_info_for_mask->character_code_3 = $data['3-х символьный код'];
                $country_info_for_mask->iso_code = $data['ISO-код'];
                $country_info_for_mask->full_name = $data['Полное наименование'];
                $country_info_for_mask->title_in_english = $data['Название на английском'];
                $country_info_for_mask->location = $data['Расположение'];

                if(!$country_info_for_mask->save()){
                    echo "<pre>"; print_r($country_info_for_mask);
                    echo "<pre>"; print_r($country_info_for_mask->errors);die();
                }

            }
        });

    }

    public function findCountry($index_name)
    {
   
        $country = Country::find()
            ->where(['index_name' => trim($index_name)])
            ->one();

        if ($country) {
            return $country->id;
        }
        return false;
    }
}