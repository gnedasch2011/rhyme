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
