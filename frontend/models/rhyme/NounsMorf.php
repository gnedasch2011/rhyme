<?php

namespace app\models\rhyme;

use Yii;

/**
 * This is the model class for table "nouns_morf".
 *
 * @property int $IID
 * @property string $word
 * @property int $code
 * @property int $code_parent
 * @property int $plural
 * @property string $gender
 * @property string $wcase
 * @property int $soul
 */
class NounsMorf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nouns_morf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['word', 'code', 'code_parent'], 'required'],
            [['code', 'code_parent', 'plural', 'soul'], 'integer'],
            [['gender', 'wcase'], 'string'],
            [['word'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IID' => 'Iid',
            'word' => 'Word',
            'code' => 'Code',
            'code_parent' => 'Code Parent',
            'plural' => 'Plural',
            'gender' => 'Gender',
            'wcase' => 'Wcase',
            'soul' => 'Soul',
        ];
    }
}
