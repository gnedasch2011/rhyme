<?php foreach ($model->suggestionConstructor as $suggestionConstructor): ?>
    <div class="info">
        <div class="beginState">
            <?php foreach ($suggestionConstructor->partsSuggestion as $partsSuggestion): ?>
                <span class="click_word click_word_template"><?= $partsSuggestion->text; ?></span>
            <?php endforeach; ?>
        </div>

        <a class="getString"
           data-success-str="1 word 5 word 4 word 2 word"
           href="#">
            Получить строку
        </a>
        <div class="result"
            data-id-full-text = '<?= $suggestionConstructor->id ;?>'
        ></div>
    </div>
<?php endforeach; ?>

<?php
$script = <<< JS
    $(document).on('click', ".click_word", function (e) {
        $(e.target).addClass('inResult')
        $('.result').append('<div class= "click_word_template inResult" > ' + $(e.target).text() + ' </div>');
        $(e.target).remove()
    })


    $(document).on('click', ".inResult", function (e) {
        $('.info .beginState').append('<div class= "click_word_template click_word" > ' + $(e.target).text() + ' </div>');
        $(e.target).remove()
    })
    
    function checkStr(str)
    {
        //если в .beginState 0 элементов, то отправляем строку на проверку
         $(e.target).parents('.result').find('.click_word_template').each(function (i, val) {
            var text = $.trim($(val).text());
            str = str + ' ' + text
        })
        if(str==""){
            
        }
    }

    // $(document).on('click', ".getString", function (e) {
    //     var str = '';
    //     $(e.target).parents('.result').find('.click_word_template').each(function (i, val) {
    //         var text = $.trim($(val).text());
    //         str = str + ' ' + text
    //     })
    //     // $(".result .click_word_template").each(function (i, val) {
    //     //     var text = $.trim($(val).text());
    //     //     str = str + ' ' + text
    //     // })
    //     console.log(str);
    //     checkStr(str)
    // })
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<style>
    .click_word_template {
        padding: 5px;
        display: inline-block;
        cursor: pointer;
    }

    .wrong {
        color: red;
    }

    .success {
        color: green;
    }
</style>