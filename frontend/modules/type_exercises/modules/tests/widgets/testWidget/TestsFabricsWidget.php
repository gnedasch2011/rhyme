<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 12.12.2019
 * Time: 8:13
 */

namespace frontend\modules\type_exercises\modules\tests\widgets\testWidget;


class TestsFabricsWidget extends \yii\base\Widget
{
    public $test;
    public $group_test_id;
    public $temp;

    public function init()
    {
        parent::init();

        $test = $this->test;
        echo "<pre>";
        print_r($test->group_test_id);
        die();



    }

    public function run()
    {
        echo 'test';
        $this->render();
    }
}
/*
    1	Выбор из нескольких
    2	Выбор из одного
    3	Выбор с написанием своего варианта
*/