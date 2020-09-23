<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 03.08.2020
 * Time: 16:31
 */

namespace frontend\modules\url\components\rule;

use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class UrlRule extends BaseObject implements UrlRuleInterface
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

            if (($url = \frontend\modules\url\model\Url::find()
                    ->where([
                        'alias' => $matches[0],
                    ])
                    ->one()) == NULL) { // (Примечание 2)

                return false;
            }
            return [$url->route, [ // (Примечание 3)
                'param' => $url->param
            ]];
        }
        return false; //(Примечание 4)
    }
}