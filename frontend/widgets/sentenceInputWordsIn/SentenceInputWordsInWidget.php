<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 25.11.2019
 * Time: 8:43
 */

namespace frontend\widgets\sentenceInputWordsIn;

use frontend\modules\type_exercises\modules\sentence_input_words_in\models\WordsForInput;
use yii\helpers\Html;
use yii\web\HttpException;

class SentenceInputWordsInWidget extends \yii\base\Widget
{
    public $SentenceInputWordsIn;
    public $WordsForInput;
    public $resString;

    /**
     * @param WordsForInput $models
     * @return array
     */
    public function generateSpanWords($models, $countSearch): array
    {
        $str = [];

        foreach ($models as $model) {
            $str[] = Html::tag('span', '........', [
                    'class' => 'wordsForInput',
                    'data-id-sentenceInputWordsIn' => $model->sentence_input_words_in_id,
                    'data-id-wordsForInput' => $model->id,
                ]
            );
        }

        return $str;
    }

    public function init()
    {
        parent::init();

        $this->WordsForInput = $this->SentenceInputWordsIn->wordsForInput;

        //распарсить строку, сделать массив $search
        //сгенерить массив $replace, дозаполнить недостающие
        preg_match_all("/(#.*?#)/", $this->SentenceInputWordsIn->name, $mathesWords);

        $search = [];
        if (isset($mathesWords[0])) {
            $search = $mathesWords[0];
        }
        $replace = $this->generateSpanWords($this->WordsForInput, count($search));



        if(count($search)!= count($replace)){
            throw new HttpException(404 ,'Не совпадают количество заменяемых слов');
        }
        $this->resString = str_replace($search, $replace, $this->SentenceInputWordsIn->name);

    }

    public function run()
    {
        echo $this->resString;
    }
}