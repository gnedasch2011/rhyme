<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\sentence\models\Sentence */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sentence-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type_exercises_id')->dropDownList(\frontend\modules\type_exercises\models\TypeExercises::allType(), ['value' => $model::TYPE_EXERCISES_ID]) ?>

    <h2>Части предолжения</h2>
    <div class="new-field">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model->expressions, "[0]expressions")->textInput() ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <?= $form->field($model->expressions, "[0]position")->textInput(['placeholder' => '1']) ?>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="#"
               data-form-name="<?= $model->expressions->formName(); ?>"
               data-template="expressions"
               class="add_form"><i class="glyphicon glyphicon-plus"></i></a>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
