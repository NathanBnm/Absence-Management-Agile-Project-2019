$(document).ready(function () {
    $('#message').keydown(function () {
        var charnum = $(this).val().length;
        var msg = charnum + ' / 255';
        if (charnum > 255) {
            $('#message').addClass('is-danger');
        } else {
            $('#count').text(msg);
        }
    });

    $('#message').keyup(function () {
        var charnum = $(this).val().length;
        if (charnum <= 255) {
            $('#message').removeClass('is-danger');
        }
    });
});