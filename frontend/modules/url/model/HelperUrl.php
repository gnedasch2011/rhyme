<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 07.09.2020
 * Time: 18:28
 */

namespace frontend\modules\url\model;

use app\models\rhyme\NamesOrf;
use yii\base\Model;

class HelperUrl extends Model
{
    public static function getAllUrls()
    {
        $res = [];

        $NamesOrfs = NamesOrf::find()
            ->asArray()
            ->limit(101)
            ->all();


        $urlsNamesOrf = [];

        foreach ($NamesOrfs as $NamesOrf) {
            $urlsNamesOrf[] = '/rhyme/' . $NamesOrf['word'];
        }


        $res = array_merge($urlsNamesOrf);

        return $res;
    }
}