<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 19.11.2019
 * Time: 8:06
 */

namespace frontend\widgets\fabric_widget;

use frontend\modules\type_exercises\models\TypeExercises;
use yii\base\Widget;

class FabricWidget extends Widget
{
    public $exercise;
    public $template;
    public $model;

    public function init()
    {
        parent::init();
        if ($this->exercise === null) {
            throw new \Exception('Error!');
        }
        $this->model = TypeExercises::returnTypeExcercise($this->exercise->type_exercises_id, $this->exercise->id);

        $this->template = $this->model->template;
    }

    public function run()
    {
        return $this->render($this->template, ['model' => $this->model]);
    }
}