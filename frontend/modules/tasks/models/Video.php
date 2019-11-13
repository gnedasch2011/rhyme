<?php

namespace frontend\modules\tasks\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $tasks_id
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tasks_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 450],
            [['id', 'tasks_id'], 'unique', 'targetAttribute' => ['id', 'tasks_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'url' => 'Url',
            'tasks_id' => 'Tasks ID',
        ];
    }
}
