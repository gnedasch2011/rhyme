<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 03.08.2020
 * Time: 16:31
 */

namespace frontend\modules\url\components;

use app\models\residentname\Url;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class CountryUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        return false;  // данное правило не применимо
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        $pattern = "%([a-zA-Z0-9-]+)?$%";

        if (preg_match($pattern, $pathInfo, $matches)) {

            if (count($matches) != 2) { // условие для выхода (Примечание 1)
                return false;
            }
        
            if (($url = Url::find()
                    ->where([
                        'url' => $matches[0],
                        'route' => ['city', 'country']
                    ])
                    ->one()) == NULL) { // (Примечание 2)
               return false;
            }

            return ['/residentname/place-view', [ // (Примечание 3)
                'url' => $url
            ]];
        }
        return false; //(Примечание 4)
    }
}