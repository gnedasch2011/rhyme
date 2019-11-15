<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'video_id')->dropDownList(\frontend\modules\tasks\models\Video::allType())->label('Видео'); ?>
    <?= $form->field($model, 'teoriya_id')->dropDownList(\frontend\modules\tasks\models\Teoriya::allType())->label('Теория'); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя дня') ?>
    <?= $form->field($model, 'course_id')->textInput(['value'=>1]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
