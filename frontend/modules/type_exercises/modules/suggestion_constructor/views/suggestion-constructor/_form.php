<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\suggestion_constructor\models\SuggestionConstructor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suggestion-constructor-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_exercises_id')->textInput() ?>
    <?= $form->field($model, '[partsSuggestion][text]')->textInput() ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
