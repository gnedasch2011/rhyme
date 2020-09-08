<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 25.11.2019
 * Time: 8:43
 */

namespace common\widgets\micromark;


class MicromarkWidget extends \yii\base\Widget
{
    public $template;
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render($this->template, [
            'items' => $this->items,
        ]);
    }
}