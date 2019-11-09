<?php

namespace frontend\modules\type_exercises\modules\suggestion_constructor\models;

use Yii;

/**
 * This is the model class for table "suggestion_constructor".
 *
 * @property int $id
 * @property string $name
 * @property string $full_text
 * @property int $type_exercises_id
 */
class SuggestionConstructor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suggestion_constructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id'], 'integer'],
            [['name', 'full_text'], 'string', 'max' => 45],
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
            'full_text' => 'Full Text',
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }


    public function getPartsSuggestion()
    {
        return $this->hasMany(PartsSuggestion::className(), ['id' => 'suggestion_constructor_id']);
    }


}
