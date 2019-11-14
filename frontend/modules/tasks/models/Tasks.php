<?php

namespace frontend\modules\tasks\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property int $course_id
 * @property int $video_id
 * @property int $teoriya_id
 */
class Tasks extends \yii\db\ActiveRecord
{

    use CreateAdmitTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'course_id', 'video_id', 'teoriya_id'], 'required'],
            [['course_id', 'video_id', 'teoriya_id'], 'integer'],
            [['name'], 'string', 'max' => 450],
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
            'course_id' => 'Course ID',
            'video_id' => 'Video ID',
            'teoriya_id' => 'Teoriya ID',
        ];
    }
}
