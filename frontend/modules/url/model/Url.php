<?php

namespace frontend\modules\url\model;

use frontend\modules\page\model\Page;
use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property string $alias
 * @property string $title
 * @property string $keyword
 * @property string $param
 * @property string $route
 * @property string $description
 * @property string $status
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
            [['alias', 'title', 'keywords', 'route', 'description', 'status'], 'string', 'max' => 255],
            [['param'], 'integer']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'keywords' => 'Keyword',
            'param' => 'Param',
            'route' => 'Route',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
    }

    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'param']);
    }


}
