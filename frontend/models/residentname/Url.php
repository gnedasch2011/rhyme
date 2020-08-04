<?php

namespace app\models\residentname;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $param
 * @property string|null $route
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'param'], 'integer'],
            [['url', 'route'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'param' => 'Param',
            'route' => 'Route',
        ];
    }
}
