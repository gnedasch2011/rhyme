<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "declines_nouns_value".
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $declines_nouns_id
 * @property int|null $cases_id
 * @property string|null $items_id
 * @property string|null $value
 */
class DeclinesNounsValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'declines_nouns_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'declines_nouns_id', 'cases_id'], 'integer'],
            [['items_id', 'value'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'declines_nouns_id' => 'Declines Nouns ID',
            'cases_id' => 'Cases ID',
            'items_id' => 'Items ID',
            'value' => 'Value',
        ];
    }
}
