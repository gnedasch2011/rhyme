<?php

namespace frontend\modules\type_exercises\modules\suggestion_constructor\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "group_suggestion_constructor".
 *
 * @property int $id
 * @property string $name
 * @property int $type_exercises_id
 */
class GroupSuggestionConstructor extends \yii\db\ActiveRecord
{

    use CreateAdmitTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_suggestion_constructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['type_exercises_id'], 'integer'],
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
        ];
    }
}
