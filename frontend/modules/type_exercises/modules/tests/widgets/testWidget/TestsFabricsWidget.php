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
    public $temp = [
        '1' => 'change_several',
        '2' => 'change_one',
        '3' => 'change_one_and_writing_your',
    ];
    public $templateTest;

    public function init()
    {
        parent::init();

        $test = $this->test;
        $this->templateTest = $this->temp[$test->type_test_id];
    }

    public function run()
    {
        return $this->render($this->templateTest, [
            'test' => $this->test,
        ]);
    }
}
/*
    1	Выбор из нескольких
    2	Выбор из одного
    3	Выбор с написанием своего варианта
*/