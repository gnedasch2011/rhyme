<?php
use yii\helpers\Html;

echo Html::dropDownList('Exercises[id_exercises_diff]', "", $model_type->allType(), ['class'=>'form-control']);