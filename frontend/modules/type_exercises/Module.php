<?php

namespace frontend\modules\type_exercises;

/**
 * type_exercises module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\type_exercises\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'suggestion_constructor' => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'frontend\modules\type_exercises\modules\suggestion_constructor\Module',
            ],
            'sentence' => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'frontend\modules\type_exercises\modules\sentence\Module',
            ],

            'tests' => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'frontend\modules\type_exercises\modules\tests\Module',
            ],
        ];
        // custom initialization code goes here
    }
}
