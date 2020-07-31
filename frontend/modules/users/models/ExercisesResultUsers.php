<?php

namespace frontend\modules\users\models;

use Yii;

/**
 * This is the model class for table "exercises_result_users".
 *
 * @property int $id
 * @property string $exercises_id
 * @property string $user_id
 * @property string $result
 * @property string $type_exercises_id
 * @property string $status
 * @property int $status_id
 */
class ExercisesResultUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercises_result_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id'], 'required'],
            [['id', 'status_id'], 'integer'],
            [['exercises_id', 'user_id', 'type_exercises_id', 'status'], 'string', 'max' => 450],
            [['result'], 'string', 'max' => 4500],
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
            'exercises_id' => 'Exercises ID',
            'user_id' => 'User ID',
            'result' => 'Result',
            'type_exercises_id' => 'Type Exercises ID',
            'status' => 'Status',
            'status_id' => 'Status ID',
        ];
    }
}
