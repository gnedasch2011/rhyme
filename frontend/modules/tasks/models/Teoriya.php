<?php

namespace frontend\modules\tasks\models;

use Yii;

/**
 * This is the model class for table "teoriya".
 *
 * @property int $id
 * @property string $text
 * @property string $template
 * @property int $tasks_id
 */
class Teoriya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teoriya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tasks_id'], 'required'],
            [['id', 'tasks_id'], 'integer'],
            [['text', 'template'], 'string', 'max' => 450],
            [['id', 'tasks_id'], 'unique', 'targetAttribute' => ['id', 'tasks_id']],
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
            'template' => 'Template',
            'tasks_id' => 'Tasks ID',
        ];
    }
}
