$(document).ready(function () {

    var numbers = $(".numbers");
    var code = $('#code');

    numbers.click(function (e) {
        var number = e.target.id;
        if (code.val().length < 4){
            code.val(code.val() + number);
        }
        if (code.val().length === 4){
            code.attr('type', 'password');
            code.attr('disabled', 'disabled');
        }
    });

    code.on('input',function (e) {
        if (code.val().length === 4){
            code.attr('type', 'password');
            code.attr('disabled', 'disabled');
        }
    })
});