<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "city_declines_nouns".
 *
 * @property int $id
 * @property int|null $city_id
 * @property int|null $declines_nouns_id
 * @property int|null $cases_id
 * @property string|null $value
 */
class CityDeclinesNouns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city_declines_nouns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'declines_nouns_id', 'cases_id'], 'integer'],
            [['value'], 'string', 'max' => 45],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'declines_nouns_id' => 'Declines Nouns ID',
            'cases_id' => 'Cases ID',
            'value' => 'Value',
        ];
    }
}
