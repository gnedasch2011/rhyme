<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\type_exercises\modules\sentence\models\SentenceCheck;

$SentenceCheck = new SentenceCheck();
?>
<?php foreach ($model->sentence as $sentence): ?>
    <div class="sentence_item" data-id-sentence="<?= $sentence->id; ?>">

        <h3> <?= $sentence->desc; ?></h3>
        <p>Используйе данные фразы</p>
        <div>
            <ul class="sentence_item_expressions">
                <?php foreach ($sentence->expressions as $expression): ?>
                    <li><span class="expression_item"><?= $expression->expressions; ?>; </span></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($SentenceCheck, 'text', ['options' => []])->textarea([
            'value' => 'iland;',
            'class' => 'check_sentence form-control',
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
<?php endforeach; ?>
<?= Html::button('Проверить все предложения', ['class' => 'btn btn-primary check_everyone_sentence_item']);
?>

<?php
$script = <<< JS

            function searchText(needle, haystack)
            {
                if(haystack.indexOf(needle)== -1){
                    return false;
                } else {
                    return true;
                }
            }
            
            function checkTextInSentence(context)
            {
                let expressions = context.find('.sentence_item_expressions li'), 
                    textForCheck = context.find('.check_sentence').val()       
                    errors = []          
                    ;
                              
                expressions.each(function(i, val) {
                    
                    if(!searchText($(val).text, textForCheck)){
                        errors.push(false);                       
                    }                   
                    console.log(errors);
                })
                        
            }
            
          $(document).on('click','.check_everyone_sentence_item',function (e) { 
                 e.preventDefault();
                 let items = $('.sentence_item');
                 let errors =[];
                 
                items.each(function(i, context) {      
                    errors.push(checkTextInSentence($(context)));
                })
                
          })
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>