<?php

namespace frontend\modules\type_exercises\modules\sentence_input_words_in\models;

use Yii;

/**
 * This is the model class for table "sentence_input_words_in".
 *
 * @property int $id
 * @property string $name
 * @property int $group_input_words_in_sent_id
 * @property int $positon
 */
class SentenceInputWordsIn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sentence_input_words_in';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['group_input_words_in_sent_id'], 'required'],
            [['group_input_words_in_sent_id', 'positon', 'sentence_input_words_in_type_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'group_input_words_in_sent_id' => 'Group Input Words In Sent ID',
            'positon' => 'Positon',
            'sentence_input_words_in_type_id' => 'sentence_input_words_in_type_id',
        ];
    }

    public function getWordsForInput()
    {
        return $this->hasMany(WordsForInput::className(), ['sentence_input_words_in_id' => 'id']);
    }

    public function getWordsForInputForDropSelect()
    {
        return $this->hasMany(WordsForInput::className(), ['sentence_input_words_in_id' => 'id']);
    }

}
