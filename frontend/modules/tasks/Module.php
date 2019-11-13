<?php

namespace frontend\modules\tasks;

/**
 * tasks module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\tasks\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {

        parent::init();

        $this->modules = [
            'test' => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'frontend\modules\type_exercises\modules\suggestion_constructor\Module',
            ]
        ];
        // custom initialization code goes here
    }
}
