<?php

namespace frontend\modules\type_exercises\models;

use Yii;

/**
 * This is the model class for table "type_exercises".
 *
 * @property int $id
 * @property string $name
 */
class TypeExercises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_exercises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 45],
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
            'name' => 'Name',
        ];
    }
}
