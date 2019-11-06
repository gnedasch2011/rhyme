<?php

namespace frontend\modules\tests\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property string $text
 * @property string $right_answer
 * @property int $qustions_id
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qustions_id'], 'required'],
            [['id', 'qustions_id'], 'integer'],
            [['text', 'right_answer'], 'string', 'max' => 45],
            [['id', 'qustions_id'], 'unique', 'targetAttribute' => ['id', 'qustions_id']],
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
            'right_answer' => 'Right Answer',
            'qustions_id' => 'Qustions ID',
        ];
    }
}
