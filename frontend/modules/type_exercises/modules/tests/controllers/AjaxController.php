<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.12.2019
 * Time: 9:11
 */

namespace frontend\modules\type_exercises\modules\tests\controllers;


use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionCheckTests()
    {
        $mockData = [
            [
                'idTest' => 1,
                'idQuestion' => 1,
                'arrIdAnswers' => [1],
            ],
            [
                'idTest' => 2,
                'idQuestion' => 3,
                'arrIdAnswers' => [7, 8],
            ],
        ];
    

        echo "<pre>"; print_r($mockData);die();
//        $arrDataResultTest = \Yii::$app->request->post('data');



    }
    //проверка разных
    //типов тестов
}