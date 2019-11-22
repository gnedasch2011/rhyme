<?php

namespace frontend\modules\type_exercises\modules\sentence_input_words_in\models;

use Yii;

/**
 * This is the model class for table "group_input_words_in_sent".
 *
 * @property int $id
 * @property string $name
 * @property int $positon
 * @property int $type_exercises_id
 */
class GroupInputWordsInSent extends \yii\db\ActiveRecord
{
    public $template = 'group_input_words_in_sent';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_input_words_in_sent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['positon', 'type_exercises_id'], 'integer'],
            [['type_exercises_id'], 'required'],
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
            'positon' => 'Positon',
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }

    public function getSentenceInputWordsIn()
    {
        return $this->hasMany(SentenceInputWordsIn::className(), ['group_input_words_in_sent_id' => 'id']);
    }
}
