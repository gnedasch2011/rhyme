<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.11.2019
 * Time: 9:41
 */
namespace frontend\modules\admin\traits;
use yii\helpers\ArrayHelper;

trait CreateAdmitTrait
{
    public static function allType()
    {
        $allType = self::find()->all();
        return ArrayHelper::map($allType, 'id', 'name');
    }
}