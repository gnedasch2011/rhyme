<?php


namespace app\models\rhyme;


use yii\base\Model;

class WordHelper extends Model
{
    public static function numberOfVowels($word)
    {
        $numberOfVowels = 0;

        preg_match_all('/[а-яё]/ui', $word, $matches);


        if (isset($matches[0])) {
            $numberOfVowels = count($matches[0]);
        }

        return $numberOfVowels;
    }

    public static function numberOfConsonants($word)
    {

        $numberOfVowels = 0;

        preg_match_all('/[бвгджзйклмнпрстфхчцшщ]/ui', $word, $matches);

        if (isset($matches[0])) {
            $numberOfVowels = count($matches[0]);
        }

        return $numberOfVowels;
    }
}