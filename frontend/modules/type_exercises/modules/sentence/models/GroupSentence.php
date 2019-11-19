<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "group_sentence".
 *
 * @property int $id
 * @property int $type_exercises_id
 */

class GroupSentence extends \yii\db\ActiveRecord
{
    use CreateAdmitTrait;
    const TYPE_EXERCISES_ID = 3;
    public $template = "group_sentence";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_sentence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id'], 'integer'],
            [['name'], 'string'],
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
            'type_exercises_id' => 'Type Exercises ID',
            'name' => 'name',
        ];
    }
}
