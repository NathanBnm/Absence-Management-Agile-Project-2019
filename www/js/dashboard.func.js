$(document).ready(function () {
    $('#message').keydown(function () {
        var charnum = $(this).val().length;
        var msg = charnum + ' / 255';
        $('#count').text(msg);
    });
});