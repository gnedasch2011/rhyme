<?php

namespace frontend\modules\zagadki\model;

use Yii;

/**
 * This is the model class for table "items_categorys".
 *
 * @property int $id
 * @property int $item_id
 * @property int $category_id
 */
class ItemsCategorys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items_categorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'category_id' => 'Category ID',
        ];
    }
}
