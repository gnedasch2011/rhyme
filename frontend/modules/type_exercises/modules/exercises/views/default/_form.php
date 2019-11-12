<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\exercises\models\Exercises */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercises-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tasks_id')->dropDownList(\frontend\modules\tasks\models\Tasks::allType()) ?>
    <?= $form->field($model, 'type_exercises_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_exercises_diff')->textInput() ?>



    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
