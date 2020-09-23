<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 15.09.2020
 * Time: 17:46
 */

namespace frontend\models\form;


use yii\base\Model;

class AddArticle extends Model
{

    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
        ];
    }
}