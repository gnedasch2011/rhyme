<?php

namespace frontend\modules\type_exercises\modules\suggestion_constructor\models;

use Yii;

/**
 * This is the model class for table "suggestion_constructor".
 *
 * @property int $id
 * @property string $name
 * @property string $full_text
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

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        if(isset($this->parts)){
            foreach ($this->parts as $parts){
                $parts->suggestion_constructor_id = $this->id;
                if(!$parts->save()){
                  echo '<pre>';print_r($parts->errors);die();
                }
                
            }
        }
 
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_suggestion_constructor_id'], 'integer'],
            [['full_text'], 'required'],
            [['full_text'], 'string', 'max' => 500],
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
            'group_suggestion_constructor_id' => 'Type Exercises ID',
        ];
    }


    public function setParts($parts)
    {
        return $this->parts = $parts;
    }


    public function getPartsSuggestion()
    {
        return $this->hasMany(PartsSuggestion::className(), ['id' => 'suggestion_constructor_id']);
    }


}
