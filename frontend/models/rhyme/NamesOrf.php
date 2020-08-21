<?php

namespace app\models\rhyme;

use frontend\models\behaviors\Search;
use Yii;

/**
 * This is the model class for table "names_orf".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $word
 * @property string $accent
 * @property string $word_with_accent
 */
class NamesOrf extends \yii\db\ActiveRecord
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
        return 'names_orf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['word', 'accent', 'word_with_accent'], 'string', 'max' => 100],
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


}
