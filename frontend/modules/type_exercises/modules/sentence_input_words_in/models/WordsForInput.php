<?php

namespace frontend\modules\type_exercises\modules\sentence_input_words_in\models;

use Yii;

/**
 * This is the model class for table "words_for_input".
 *
 * @property int $id
 * @property int $sentence_input_words_in_id
 * @property string $name
 * @property int $number_missed_words
 */
class WordsForInput extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'words_for_input';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sentence_input_words_in_id'], 'required'],
            [['sentence_input_words_in_id', 'number_missed_words'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sentence_input_words_in_id' => 'Sentence Input Words In ID',
            'name' => 'Name',
            'number_missed_words' => 'Number Missed Words',
        ];
    }
}
