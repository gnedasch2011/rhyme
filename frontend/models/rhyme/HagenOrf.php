<?php

namespace app\models\rhyme;

use frontend\models\behaviors\Search;
use Yii;

/**
 * This is the model class for table "hagen_orf".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $word
 * @property string $accent
 * @property string $word_with_accent
 */
class HagenOrf extends \yii\db\ActiveRecord
{
    public $query;

    public function behaviors()
    {
        return [
            'Search' => [
                'class' => Search::className(),
//            'prop1' => 'value1',
//            'prop2' => 'value2',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hagen_orf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['word'], 'string', 'max' => 100],
            [['accent'], 'string', 'max' => 450],
            [['word_with_accent'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'word' => 'Word',
            'accent' => 'Accent',
            'word_with_accent' => 'Word With Accent',
        ];
    }

    public static function randomArrWord()
    {
        $res = [];

        $arrRandomNumber = self::generateArrRandom(30, 1, 100000);

        $res = self::find()
            ->where(['id' => $arrRandomNumber])
            ->asArray()
            ->all();

        return $res;
    }

    public static function popularArrWord()
    {
        $res = [];

        $res = self::find()
            ->select('word')
            ->where(['popular' => 1])
            ->orderBy('rand()')
            ->limit(100)
            ->all();

        return $res;
    }

    public static function generateArrRandom($countItem, $begin, $end)
    {
        $res = [];

        for ($i = 0; $i < $countItem; $i++) {
            $res[] = rand($begin, $end);
        }

        return $res;
    }

    public function anotherFormWord()
    {
        $res = [];

        if (isset($this->query) && !empty($this->query)) {
            $idWord = self::find()
                ->where(['word' => $this->query])
                ->one();

            if($idWord->parent_id==0){

                $res = self::find()
                    ->where(['parent_id' => $idWord->id])
                    ->asArray()
                    ->all();

                return $res;
            }


            $res = self::find()
                ->where(['parent_id' => $idWord->parent_id])
                ->asArray()
                ->all();

            return $res;
        }

        return $res;
    }
}
