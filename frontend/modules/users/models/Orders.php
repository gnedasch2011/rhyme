<?php

namespace frontend\modules\users\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $course_id
 * @property string $paid_success
 * @property string $date_paid
 * @property int $users_id
 * @property int $users_course_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'users_id', 'users_course_id'], 'required'],
            [['id', 'users_id', 'users_course_id'], 'integer'],
            [['course_id', 'paid_success', 'date_paid'], 'string', 'max' => 45],
            [['id', 'users_id', 'users_course_id'], 'unique', 'targetAttribute' => ['id', 'users_id', 'users_course_id']],
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
            'paid_success' => 'Paid Success',
            'date_paid' => 'Date Paid',
            'users_id' => 'Users ID',
            'users_course_id' => 'Users Course ID',
        ];
    }
}
