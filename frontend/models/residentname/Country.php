<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $man
 * @property string|null $woman
 * @property string|null $townspeople
 * @property string|null $img
 * @property string|null $index_name
 * @property string|null $link
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'man', 'woman', 'townspeople', 'index_name', 'link'], 'string', 'max' => 45],
            [['img'], 'string', 'max' => 450],
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
            'man' => 'Man',
            'woman' => 'Woman',
            'townspeople' => 'Townspeople',
            'img' => 'Img',
            'index_name' => 'Index Name',
            'link' => 'Link',
        ];
    }

    public function getNounseValueCountry()
    {
        return $this->hasMany(NounseValue::className(), ['item_id' => 'id'])
            ->where([
                'nounse_value.kinds_of_nouns_id' => 1,
                'nounse_value.cases_id' => 2,
                'nounse_value.declines_nouns_id' => 1,
            ])

            ;
    }
}
