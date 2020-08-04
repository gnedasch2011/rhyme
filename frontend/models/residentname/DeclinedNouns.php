<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "declined_nouns".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_rus
 */
class DeclinedNouns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'declined_nouns';
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
