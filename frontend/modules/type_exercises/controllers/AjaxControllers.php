<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 15.11.2019
 * Time: 9:19
 */

namespace frontend\modules\type_exercises\controllers;


use yii\web\Controller;

class AjaxControllers extends Controller
{
    
    
    public function actionGetAllExcercises($type_id)
    {
        echo "<pre>"; print_r($type_id);die();
    }
}