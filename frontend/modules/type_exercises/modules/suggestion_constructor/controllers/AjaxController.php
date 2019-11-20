<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 20.11.2019
 * Time: 8:28
 */

namespace frontend\modules\type_exercises\modules\suggestion_constructor\controllers;


use frontend\modules\type_exercises\modules\suggestion_constructor\models\SuggestionConstructor;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionCheckFullSuggestion()
    {
        $str = trim(\Yii::$app->request->post('str'));
        $dataFullTextId = \Yii::$app->request->post('dataFullTextId');

        if ($dataFullTextId) {
            $SuggestionConstructor = SuggestionConstructor::findOne($dataFullTextId);
            if ($SuggestionConstructor->full_text == $str) {
                return json_encode(['success' => true]);
            }
        }

        return false;
    }
}

