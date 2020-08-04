<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "cases".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_rus
 */
class Cases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_rus'], 'string', 'max' => 45],
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
            'name_rus' => 'Name Rus',
        ];
    }
}
