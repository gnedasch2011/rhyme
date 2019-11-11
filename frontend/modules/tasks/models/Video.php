<?php

namespace frontend\modules\tasks\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $idvideo
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
            [['idvideo', 'tasks_id'], 'required'],
            [['idvideo', 'tasks_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 450],
            [['idvideo', 'tasks_id'], 'unique', 'targetAttribute' => ['idvideo', 'tasks_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvideo' => 'Idvideo',
            'name' => 'Name',
            'url' => 'Url',
            'tasks_id' => 'Tasks ID',
        ];
    }
}
