<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\exercises\models\Exercises */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="exercises-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="new-field">
        <div class="row">
            <?= $form->field($model, '[0]tasks_id')->dropDownList(\frontend\modules\tasks\models\Tasks::allType())->label('День'); ?>
            <?= $form->field($model, '[0]name')->textInput(['maxlength' => true])->label('Имя упражнения для выбранного из типов') ?>
            <?= $form->field($model, '[0]position')->textInput()->label('Позиция') ?>
            <?= $form->field($model, '[0]type_exercises_id')->dropDownList(\frontend\modules\type_exercises\models\TypeExercises::allType(), ['class' => 'form-control type_exerc type_exercises_id__change'])->label('Тип упражнений'); ?>
            <div class="type_exercises_id__change_result">
                <?= $form->field($model, '[0]id_exercises_diff')->dropDownList(\frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSuggestionConstructor::allType())->label('Id упражнений раз`ных типов') ?>
            </div>
        </div>
        `
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="#"
               data-form-name="Exercises"
               data-template="Exercises"
               class="add_form"><i class="glyphicon glyphicon-plus"></i></a>
        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
