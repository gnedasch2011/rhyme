<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use Yii;

/**
 * This is the model class for table "group_sentence".
 *
 * @property int $id
 * @property int $type_exercises_id
 */
class GroupSentence extends \yii\db\ActiveRecord
{
    const TYPE_EXERCISES_ID = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_sentence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id'], 'required'],
            [['id', 'type_exercises_id'], 'integer'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }
}
