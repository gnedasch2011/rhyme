<?php

use yii\helpers\Html;

?>
    <div class="row">
        <?= Html::input('text', "$formName" . "[$positon]" . "[name]", null, ['class' => 'form-control'])?>

        <?= Html::input('text', "$formName" . "[$positon]" . "[position]", null, ['class' => 'form-control']) ?>

      <?= Html::dropDownList('text', "$formName" . "[$positon]" . "[type_exercises_id]", \frontend\modules\type_exercises\models\TypeExercises::allType(), ['class' => 'form-control type_exerc type_exercises_id__change'])?>

            <?= Html::dropDownList('text', "$formName" . "[$positon]" . "[id_exercises_diff]", \frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSuggestionConstructor::allType(), ['class' => 'form-control type_exerc type_exercises_id__change']) ?>

