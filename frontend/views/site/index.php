<?php

/* @var $this yii\web\View */

use frontend\modules\tests\models\Test;

$this->title = 'Массажные кресла';
?>
<?php
$script = <<< JS
  
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
                $model = new Test();
                echo $form->field($model, 'checkboxList')
                    ->radioList([
                        'a' => 'Элемент А',
                        'б' => 'Элемент Б',
                        'в' => 'Элемент В',
                    ]);
                ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

    <p>Массажжные кресла</p>

<?php
$script = <<< JS
    $('#login-form').on('beforeSubmit', function(){
        console.log('ff');
       var data = $(this).serialize();
        $.ajax({
            url: '/tests/ajax/next-question',
            type: 'POST',
            data: data,
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>