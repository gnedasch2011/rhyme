<?php

namespace frontend\modules\type_exercises\modules\suggestion_constructor\models;

use Yii;

/**
 * This is the model class for table "parts_suggestion".
 *
 * @property int $id
 * @property int $suggestion_constructor_id
 * @property string $text
 * @property string $position
 */
class PartsSuggestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parts_suggestion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'suggestion_constructor_id'], 'required'],
            [['id', 'suggestion_constructor_id'], 'integer'],
            [['text', 'position'], 'string', 'max' => 45],
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
            'suggestion_constructor_id' => 'Suggestion Constructor ID',
            'text' => 'Text',
            'position' => 'Position',
        ];
    }
    
    
        public function getSuggestionConstructor()
        {
            return $this->hasOne(SuggestionConstructor::className(), ['id' => 'suggestion_constructor_id']);
        }
    
}
