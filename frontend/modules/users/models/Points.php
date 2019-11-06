<?php

namespace frontend\modules\users\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property int $id
 * @property int $users_id
 * @property int $exercises_id
 * @property string $points_count
 */
class Points extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'users_id', 'exercises_id'], 'required'],
            [['id', 'users_id', 'exercises_id'], 'integer'],
            [['points_count'], 'string', 'max' => 45],
            [['id', 'users_id', 'exercises_id'], 'unique', 'targetAttribute' => ['id', 'users_id', 'exercises_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_id' => 'Users ID',
            'exercises_id' => 'Exercises ID',
            'points_count' => 'Points Count',
        ];
    }
}
