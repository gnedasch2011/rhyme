<?php

namespace frontend\modules\users\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $course_id
 * @property string $userscol
 * @property string $name
 * @property string $email
 * @property string $date_create
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id'], 'required'],
            [['id', 'course_id'], 'integer'],
            [['userscol', 'name', 'email', 'date_create'], 'string', 'max' => 45],
            [['id', 'course_id'], 'unique', 'targetAttribute' => ['id', 'course_id']],
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
            'userscol' => 'Userscol',
            'name' => 'Name',
            'email' => 'Email',
            'date_create' => 'Date Create',
        ];
    }
}
