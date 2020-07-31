<?php

namespace frontend\modules\tasks\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;

/**
 * This is the model class for table "teoriya".
 *
 * @property int $id
 * @property string $name
 * @property string $template
 */
class Teoriya extends \yii\db\ActiveRecord
{

    use CreateAdmitTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teoriya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'template'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'name',
            'template' => 'Template',
        ];
    }
}
