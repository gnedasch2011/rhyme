$(document).on('click', '.openAnswerJs', function (e) {
    e.preventDefault();

    $(this).fadeOut(0);
    $(this).next().css({"display": "block"});
})