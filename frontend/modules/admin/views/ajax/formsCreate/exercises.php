<?php

use yii\helpers\Html;

?>
<div class="row new_item">
    <h2>Упражнение №<?= $positon; ?></h2>
    Имя упражнения для выбранного из типов
    <?= Html::dropDownList("$formName" . "[$positon]" . "[tasks_id]", null, \frontend\modules\tasks\models\Tasks::allType(), ['class' => 'form-control']) ?>

    <?= Html::input('text', "$formName" . "[$positon]" . "[name]", null, ['class' => 'form-control']) ?>

    <?= Html::input('text', "$formName" . "[$positon]" . "[position]", null, ['class' => 'form-control']) ?>

    <?= Html::dropDownList("$formName" . "[$positon]" . "[type_exercises_id]", null, \frontend\modules\type_exercises\models\TypeExercises::allType(), ['class' => 'form-control type_exercises_id__change']) ?>

    <?= Html::dropDownList("$formName" . "[$positon]" . "[id_exercises_diff]", null, \frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSuggestionConstructor::allType(), ['class' => 'form-control type_exercises_id__change_result']) ?>
</div>

