<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use Yii;

/**
 * This is the model class for table "sentence".
 *
 * @property int $id
 * @property string $desc
 * @property int $type_exercises_id
 */
class Sentence extends \yii\db\ActiveRecord
{
    const TYPE_EXERCISES_ID = 3;

    public function getTypeExercisesId()
    {

    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sentence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_exercises_id'], 'required'],
            [['type_exercises_id'], 'integer'],
            [['desc'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc' => 'Desc',
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }
}
