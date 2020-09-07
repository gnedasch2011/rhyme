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

        $res = self::find()
            ->limit(30)
            ->orderBy('rand()')
            ->asArray()
            ->all();

        return $res;

    }

    public static function popularArrWord()
    {
        $res = [];

        $res = self::find()
            ->limit(30)
            ->orderBy('rand()')
            ->where(['popular' => 1])
            ->all();

        return $res;
    }

}
