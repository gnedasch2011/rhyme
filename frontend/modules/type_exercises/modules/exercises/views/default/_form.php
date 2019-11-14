<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\exercises\models\Exercises */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercises-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2>Video</h2>

    <h2>Teory</h2>
    <?= $form->field($model, 'tasks_id')->dropDownList(\frontend\modules\tasks\models\Tasks::allType()) ?>
    <?= $form->field($model, 'type_exercises_id')->dropDownList(\frontend\modules\type_exercises\models\TypeExercises::allType())->label('Тип упражнений'); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя упражнения') ?>

    <h2>Подтягивается ajax-ом после смены "Тип упражнений"</h2>
    <?= $form->field($model, 'id_exercises_diff')->textInput()->label('Id упражнений разных типов') ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
