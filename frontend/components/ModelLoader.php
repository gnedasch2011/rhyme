<?php


namespace frontend\components;


use yii\base\Model;

class ModelLoader extends Model
{
    public static function createLoadMultipleModel($multiModel, $post)
    {

        if (!$post[$multiModel->formName()]) {
             return $multiModel;
        }

        if (isset($post[$multiModel->formName()])) {
            $keys = array_keys($post[$multiModel->formName()]);
        }

        $formName = "\\" . $multiModel->className();

        $models = [];
        foreach ($keys as $index) {
            $models[$index] = new $formName;
        }

        return $models;
    }
}