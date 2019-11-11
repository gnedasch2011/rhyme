<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use Yii;

/**
 * This is the model class for table "sentence".
 *
 * @property int $id
 * @property string $desc
 * @property int $type_exercises_id
 */
class Sentence extends \yii\db\ActiveRecord
{
    const TYPE_EXERCISES_ID = 3;

    public function afterSave($insert, $changedAttributes)
    {
        if(isset($this->expressions)){

            foreach ($this->expressions as $expressions){

                $expressions->sentence_id = $this->id;
                if(!$expressions->save()){
                    echo '<pre>';print_r($expressions->errors);die();
                }

            }
        }

    }
    public function setExpressions($expressions)
    {
        return $this->expressions = $expressions;
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sentence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_exercises_id','desc'], 'required'],
            [['type_exercises_id'], 'integer'],
            [['desc'], 'string', 'max' => 4500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc' => 'Desc',
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }
}
