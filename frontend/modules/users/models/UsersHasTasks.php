<?php

namespace frontend\modules\users\models;

use Yii;

/**
 * This is the model class for table "users_has_tasks".
 *
 * @property int $id
 * @property int $course_id
 * @property int $tasks_id
 * @property string $user_id
 * @property int $is_open
 */
class UsersHasTasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_has_tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'tasks_id'], 'required'],
            [['id', 'course_id', 'tasks_id', 'is_open'], 'integer'],
            [['user_id'], 'string', 'max' => 450],
            [['id', 'course_id', 'tasks_id'], 'unique', 'targetAttribute' => ['id', 'course_id', 'tasks_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'tasks_id' => 'Tasks ID',
            'user_id' => 'User ID',
            'is_open' => 'Is Open',
        ];
    }
}
