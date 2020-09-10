<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 21.08.2020
 * Time: 10:46
 */

namespace frontend\models\behaviors;

class Search extends \yii\base\Behavior
{

    public function mostAccurateRhymes($searchWord)
    {
        $word = $this->owner->find()
            ->where(['word' => $searchWord])
            ->one();

        if (isset($word->accent)) {
            $wordsSearch = $this->owner->find()
                ->where(['accent' => $word->accent])
                ->andWhere(['!=', 'id', 1])
                ->asArray()
                ->all();

            return $wordsSearch;

        }

        return [];

    }

    /**
     * @param $arrs массив с массивами
     * @return array
     */
    public function getArrUrlName($arrs)
    {
        $countArr = count($arrs);
        $allRhymes = [];

        for ($i = 0; $i < $countArr; $i++) {
            $allRhymes = array_merge($allRhymes, $arrs[$i]);
        }

        $res = [];

        foreach ($allRhymes as $rhyme) {
            $res[$rhyme['word']]['word'] = $rhyme['word'];
            $res[$rhyme['word']]['url'] = '/rhyme/' . $rhyme['word'];
            $res[$rhyme['word']]['number_of_syllables'] = $this->countSyllables($rhyme['word']);
        }

        return $res;
    }

    public function countSyllables($str)
    {
        $text = $str;
#char patterns
        $RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
        $RusV = "[аеёиоуыэюя]";
        $RusN = "[бвгджзклмнпрстфхцчшщ]";
        $RusX = "[йъь]";

#main ruller
        $regs[] = "~(" . $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(" . $RusV . ")(" . $RusV . $RusA . ")~iu";
        $regs[] = "~(" . $RusV . $RusN . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(" . $RusN . $RusV . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(" . $RusV . $RusN . ")(" . $RusN . $RusN . $RusV . ")~iu";
        $regs[] = "~(" . $RusV . $RusN . $RusN . ")(" . $RusN . $RusN . $RusV . ")~iu";
        $regs[] = "~(" . $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(" . $RusV . ")(" . $RusA . $RusV . ")~iu";


        foreach ($regs as $cur_regxp) {
            $text = preg_replace($cur_regxp, "$1-$2", $text);
        }

        $countSyllables = explode('-', $text);

        if (is_array($countSyllables)) {
            return count($countSyllables);
        }

        return 0;
    }


    public function getRhymesArrGroup($arr)
    {
        $RhymesArrGroup = [];

        for ($i = 10; $i >= 0; $i--) {

            foreach ($arr as $rhyme) {

                if ($rhyme['number_of_syllables'] == $i) {
                    $RhymesArrGroup[$i][] = $rhyme;
                }
            }
        }

        return $RhymesArrGroup;
    }


}