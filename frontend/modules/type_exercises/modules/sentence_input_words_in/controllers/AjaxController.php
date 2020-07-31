<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 26.11.2019
 * Time: 8:20
 */

namespace frontend\modules\type_exercises\modules\sentence_input_words_in\controllers;

use frontend\modules\type_exercises\modules\sentence_input_words_in\models\WordsForInput;

class AjaxController extends \yii\web\Controller
{
    public function actionCheckExercises()
    {
        $sentenceinputwordsin = \Yii::$app->request->post('sentenceinputwordsin');
        $wordsforinput = \Yii::$app->request->post('wordsforinput');
        $value = \Yii::$app->request->post('value');

        $SentenceInputWords = WordsForInput::find()->where(['id' => $wordsforinput, 'sentence_input_words_in_id' => $sentenceinputwordsin])->one();

        if ($SentenceInputWords->name == $value) {
            return true;
        }

        return false;
    }
}