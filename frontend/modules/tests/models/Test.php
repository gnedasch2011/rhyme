<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 05.11.2019
 * Time: 14:36
 */

namespace frontend\modules\tests\models;

use yii\base\Model;

class Test extends Model
{

    public $checkboxList;

    public function rules()
    {
        return [
            ['checkboxList', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'checkboxList' => 'checkboxList',
        ];
    }
}