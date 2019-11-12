<?php

namespace frontend\modules\type_exercises\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "type_exercises".
 *
 * @property int $id
 * @property string $name
 */
class TypeExercises extends \yii\db\ActiveRecord
{
    use CreateAdmitTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_exercises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
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
        ];
    }

    public static function allType()
    {
        $allType = self::find()->all();
        return ArrayHelper::map($allType, 'id', 'name');
    }
}
