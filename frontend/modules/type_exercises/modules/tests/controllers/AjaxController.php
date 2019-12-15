<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.12.2019
 * Time: 9:11
 */

namespace frontend\modules\type_exercises\modules\tests\controllers;


use frontend\modules\type_exercises\modules\tests\models\Tests;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionCheckTests()
    {
        $arrDataResultTest = \Yii::$app->request->post('arrDataResultTest');
        $resCheck = [];

        foreach ($arrDataResultTest as $test) {
            $resCheck[] = Tests::checkTest($test);
        }

        return json_encode($resCheck);
    }
}