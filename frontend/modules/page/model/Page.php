<?php

namespace frontend\modules\page\model;

use frontend\modules\url\model\Url;
use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $template
 * @property string $body
 * @property int $status
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['status'], 'integer'],
            ['status', 'default', 'value' => 1],
            [['template'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template' => 'Template',
            'body' => 'Body',
            'status' => 'Status',
        ];
    }

    public function getUrl()
    {
        return $this->hasOne(Url::className(), ['param' => 'id']);
    }
}


