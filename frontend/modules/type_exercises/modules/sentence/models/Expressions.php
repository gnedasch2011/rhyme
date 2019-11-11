<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use Yii;

/**
 * This is the model class for table "expressions".
 *
 * @property int $id
 * @property string $expressions
 * @property int $sentence_id
 * @property string $position
 */
class Expressions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expressions';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sentence_id'], 'required'],
            [['sentence_id', 'position'], 'integer'],
            [['expressions'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expressions' => 'Expressions',
            'sentence_id' => 'Sentence ID',
            'position' => 'Position',
        ];
    }
}
