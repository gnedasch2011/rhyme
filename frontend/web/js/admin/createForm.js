/**
 * Создание формы
 */
$(document).on('click', '.add_form', function (e) {

    var formName = $(e.currentTarget).attr('data-form-name'),
        formAttr = $(e.currentTarget).attr('data-form-attr'),
        template = $(e.currentTarget).attr('data-template'),
        formPlaceForNew = $(e.currentTarget).parents('.new-field'),
        positon = $(e.currentTarget).parents('.new-field').find('.row').length
    console.log(positon);

    var arr = {
        data: {
            formName: formName,
            formAttr: formAttr,
            template: template,
            positon: positon
        }
    };

    $.ajax({
        url: '/admin/ajax/create-form',
        method: "post",
        data: arr,
        success: function (data) {
            formPlaceForNew.append(data);
        }
    });
})

/**
 * Смена типа упражнения в создании связок
 */
$(document).on('change', '.type_exercises_id__change', function (e) {
    e.preventDefault();
    let type_exercises_id = $(e.target).val(),
        data = {type_exercises_id: type_exercises_id},
        $res = $(e.target).parents('.row').find('.type_exercises_id__change_result')
    console.log($res);
    $.ajax({
        url: '/type_exercises/ajax/get-all-excercises',
        method: "post",
        data: data,

        success: function (data) {
            $res.html(data);
        }
    });
})

/*
    Проверка упражнения "Вставь слова"
 */
$(document).on('change', '.wordsForInput', function (e) {
    e.preventDefault();
    let sentenceinputwordsin = $(this).attr('data-id-sentenceinputwordsin'),
        wordsforinput = $(this).attr('data-id-wordsforinput'),
        value = $(this).val().trim();

    let data = {
        sentenceinputwordsin: sentenceinputwordsin,
        wordsforinput: wordsforinput,
        value: value,
    };


    $.ajax({
        url: '/type_exercises/sentence_input_words_in/ajax/check-exercises',
        method: "post",
        data: data,

        success: function (data) {
            if(data){
                $(e.target).css({"border":"1px solid green" })
            } else {
                $(e.target).css({"border":"1px solid red" })
            }
        }
    });
})


/**
 * Интерфейс для каждого упражнения, навешиваем событие checked_exercise
 */


  $(document).on('click','.checkAllExercise',function (e) {
         e.preventDefault();
         $('.exercise_check').trigger('sentence_check')
         $('.exercise_check').trigger('suggestion_check')
  })

/*
    Проверить все упражнения "Вставь слова" и сохранить
 */

