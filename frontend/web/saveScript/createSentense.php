<script>
    $(document).on('click', ".click_word", function (e) {
        $(e.target).addClass('inResult')
        $('.result').append('<div class= "click_word_template inResult" > '+ $(e.target).text() + ' < /div>');
        $(e.target).remove()
    })


    $(document).on('click', ".inResult", function (e) {
        $('.info').append('<div class= "click_word_template click_word" > '+ $(e.target).text() + ' < /div>');
        $(e.target).remove()
    })


    $(document).on('click', ".getString", function (e) {
        var str = '';
        $(".result .click_word_template").each(function (i, val) {
            var text = $.trim($(val).text());
            str = str + ' ' + text
        })
        checkStr(str)
    })
</script>

<div class="info">
    <div class="click_word click_word_template">
        1 word
    </div>
    <div class="click_word click_word_template">
        2 word
    </div>
    <div class="click_word click_word_template">
        3 word
    </div>
    <div class="click_word click_word_template">
        4 word
    </div>
    <div class="click_word click_word_template">
        5 word
    </div>




</div>



<style>
    body {
        padding: 20px;
        font-family: Helvetica;
    }

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