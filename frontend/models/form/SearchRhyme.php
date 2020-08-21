<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 21.08.2020
 * Time: 8:26
 */

namespace frontend\models\form;

class SearchRhyme extends \yii\base\Model
{
    public $query;

    public function rules()
    {
        return [
            ['query', 'filter', 'filter' => 'trim'],
            ['query', 'required'],
            ['query', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'query' => 'Запрос',
        ];
    }
}

