<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 07.09.2020
 * Time: 18:28
 */

namespace frontend\modules\url\model;

use app\models\rhyme\HagenOrf;
use app\models\rhyme\NamesOrf;
use yii\base\Model;

class HelperUrl extends Model
{

    const LIMIT_CONST = 50000;


    public static function getAllUrls()
    {

        if (!$res = \Yii::$app->cache->get('allUrls')) {
            $res = [];



            $HagenOrfs = HagenOrf::find()
                ->asArray()
                ->orderBy('popular desc')
                ->all();

            $urlsHagenOrfs = [];

            foreach ($HagenOrfs as $HagenOrf) {
                $urlsHagenOrfs[] = '/rhyme/' . $HagenOrf['word'];
            }


            $NamesOrfs = NamesOrf::find()
                ->asArray()
                ->all();

            $urlsNamesOrf = [];

            foreach ($NamesOrfs as $NamesOrf) {
                $urlsNamesOrf[] = '/rhyme/' . $NamesOrf['word'];
            }


            $res = array_merge($urlsHagenOrfs, $urlsNamesOrf);
            \Yii::$app->cache->set('allUrls', $res, 3600 * 6);
        }

        return $res;
    }

    public static function getCountPage()
    {

        $countPage = 0;
        $arrUrls = self::getAllUrls();

        if (!empty($arrUrls)) {
            $countPage = ceil(count($arrUrls) / self::LIMIT_CONST);
        }

        return $countPage;

    }
}