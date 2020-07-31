<?php

namespace frontend\modules\type_exercises\modules\tests\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "group_test".
 *
 * @property int $id
 * @property string $name
 * @property int $type_exercises_id
 */
class GroupTest extends \yii\db\ActiveRecord
{
    public $template = 'group_test';

    use CreateAdmitTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['type_exercises_id'], 'required'],
            [['type_exercises_id'], 'integer'],
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
            'type_exercises_id' => 'Type Exercises ID',
        ];
    }

    public function getTests()
    {
        return $this->hasMany(Tests::className(), ['group_test_id' => 'id']);
    }
}
