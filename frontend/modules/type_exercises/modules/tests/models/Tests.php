<?php

namespace frontend\modules\type_exercises\modules\tests\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $name
 * @property int $type_exercises_id
 * @property int $type_test_id1
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_exercises_id', 'type_test_id1'], 'required'],
            [['type_exercises_id', 'type_test_id1'], 'integer'],
            [['name'], 'string', 'max' => 45],
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
            'type_exercises_id' => 'Type Exercises ID',
            'type_test_id1' => 'Type Test Id1',
        ];
    }
}
