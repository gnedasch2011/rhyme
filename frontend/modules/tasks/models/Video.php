<?php

namespace frontend\modules\tasks\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $tasks_id
 */
class   Video extends \yii\db\ActiveRecord
{

    use CreateAdmitTrait;
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
            [['name', 'url'], 'string', 'max' => 450],
            [['id'], 'unique', 'targetAttribute' => ['id']],
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
        ];
    }

    public function getTasks()
    {
        return $this->hasOne(Tasks::className(), ['video_id' => 'id']);

    }
}
