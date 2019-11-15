<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\exercises\models\Exercises */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="exercises-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'type_exercises_id')->dropDownList(\frontend\modules\type_exercises\models\TypeExercises::allType(), ['class' => 'form-control type_exerc type_exercises_id__change'])->label('Тип упражнений'); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя упражнения для выбранного из типов') ?>
        <?= $form->field($model, 'position')->textInput()->label('Позиция') ?>

        <?= $form->field($model, 'tasks_id')->dropDownList(\frontend\modules\tasks\models\Tasks::allType())->label('День'); ?>

        <h2>Подтягивается ajax-ом после смены "Тип"</h2>
        <?= $form->field($model, 'id_exercises_diff')->dropDownList(\frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSuggestionConstructor::allType())->label('Id упражнений разных типов') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>


<?php
$script = <<< JS
      $(document).on('change','.type_exercises_id__change',function (e) {
             e.preventDefault();
             let type_exercises_id= $(e.target).val(),
             data = {type_exercises_id:type_exercises_id}
          
             $.ajax({
                         url: '/type_exercises/ajax/get-all-excercises',
                         method: "post",
                         data: data,
                         
                        success: function (data) {
                             console.log(data);
                        }
                     });    
             console.log('te');
      })
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>