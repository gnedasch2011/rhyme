<?php

namespace frontend\modules\type_exercises\modules\tests\models;

use Yii;

/**
 * This is the model class for table "qustions".
 *
 * @property int $id
 * @property string $text
 * @property int $tests_id
 * @property string $position
 */
class Qustions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qustions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tests_id'], 'required'],
            [['id', 'tests_id', 'position'], 'integer'],
            [['text'], 'string', 'max' => 450],
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
            'text' => 'Text',
            'tests_id' => 'Tests ID',
            'position' => 'Position',
        ];
    }
}
