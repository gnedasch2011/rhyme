<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSentence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-sentence-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'type_exercises_id')->dropDownList(\frontend\modules\type_exercises\models\TypeExercises::allType(), ['value' => $model::TYPE_EXERCISES_ID]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
