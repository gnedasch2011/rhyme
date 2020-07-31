<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.11.2019
 * Time: 9:15
 */

namespace frontend\modules\admin\behaviors;

use yii\helpers\ArrayHelper;
use yii\base\Behavior;

class AdminCommonMethodsBehavior extends Behavior
{
    public static function allType()
    {
        $allType = self::find()->all();
        return ArrayHelper::map($allType, 'id', 'name');
    }

}