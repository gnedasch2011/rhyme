<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\suggestion_constructor\models\SuggestionConstructor */
/* @var $form yii\widgets\ActiveForm */
$time = time();
$parts = new \frontend\modules\type_exercises\modules\suggestion_constructor\models\PartsSuggestion();
?>

    <div class="suggestion-constructor-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->textInput(['value' => $time]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'value' => $time]) ?>

        <?= $form->field($model, 'full_text')->textInput(['maxlength' => true, 'value' => $time]) ?>

        <?= $form->field($model, 'type_exercises_id')->textInput(['value' => $time]) ?>


        <h2>Части предолжения</h2>
        <div class="new-field">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model->parts, "[1]text")->textInput(['value' => $time]) ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <?= $form->field($model->parts, "[1]position")->textInput(['placeholder' => '1']) ?>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <a href="#"
                   data-form-name="<?= $model->parts->formName(); ?>"
                   data-form-attr="text,position"
                   data-template="suggestion_part"
                   class="add_form"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


<?php
$script = <<< JS
$(document).on('click', '.add_form', function(e) {
    
    
   var formName =  $(e.currentTarget).attr('data-form-name'),
    formAttr =  $(e.currentTarget).attr('data-form-attr'),    
    template =  $(e.currentTarget).attr('data-template'),
    formPlaceForNew = $(e.currentTarget).parents('.new-field'),
    positon = $(e.currentTarget).parents('.new-field').find('.row').length
    console.log(positon);
      
    var arr = {
       data:{
           formName:formName,
           formAttr:formAttr,
           template:template,
           positon:positon
       }
    };    
    
    $.ajax({
            url: '/admin/ajax/create-form',
            method: "post",                   
            data:arr,
            success: function (data) {
               formPlaceForNew.append(data)
            }
        });   
})

JS;

$this->registerJs($script, yii\web\View::POS_READY); ?>