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
            [['name', 'class_construct'], 'string', 'max' => 450],
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
            'class_construct' => 'class_construct',
        ];
    }

    public function returnTypeModel($type_id)
    {
        $classModel = self::findOne($type_id);
        $classModel = $classModel ?? false;

        if ($classModel) {
            $class_construct = $classModel->class_construct;
            if($classModel->class_construct){
                return new $class_construct ();
            }
            return false;
        }

        return false;


    }

}
