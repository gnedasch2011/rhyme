<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 05.02.2020
 * Time: 14:54
 */

namespace app\modules\parser\models;

use yii\helpers\FileHelper as FileHelperYii;
use yii\base\Model;

class FileHelper extends Model
{
    public static function saveRemoteImage($remoteImgLink, $pathUri)
    {
        $nameFile = basename($remoteImgLink);

        $existDirectory = self::createDirectory($pathUri);

        if ($existDirectory) {
            $imgUrlPath = $pathUri . "/" . $nameFile;
            file_put_contents($imgUrlPath, file_get_contents($remoteImgLink), true);

            return $nameFile;
        }

        return false;
    }

    public static function createDirectory($folder)
    {
        if (is_file($folder)) {
            return true;
        } elseif (!is_dir($folder)) {
            return mkdir('./' . $folder, "0777", true);
        } else {
            return true;
        }
    }

    /**
     * @param $str
     * @return mixed
     */
    public static function renderUriNameDetailGood($str)
    {
        if (is_string($str)) {
            $arr = explode('/', $str);
            $new_arr = array_diff($arr, array(''));
            $val = array_pop($new_arr);
            $val = str_replace('-', '_', $val);
            return $val;
        }

        return "/";

    }
}