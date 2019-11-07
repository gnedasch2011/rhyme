<?php

namespace frontend\modules\type_exercises\modules\comics\models;

use Yii;

/**
 * This is the model class for table "comics".
 *
 * @property int $id
 * @property string $src
 * @property string $desc
 * @property int $type_exercises_id1
 */
class Comics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id1'], 'required'],
            [['id', 'type_exercises_id1'], 'integer'],
            [['src'], 'string', 'max' => 45],
            [['desc'], 'string', 'max' => 450],
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
            'src' => 'Src',
            'desc' => 'Desc',
            'type_exercises_id1' => 'Type Exercises Id1',
        ];
    }
}
