function drugs() {

    var z = $('#test').serialize();
    $.ajax({
        type: 'post', //тип запроса: get,post либо head
        url: 'forms/forms.php', //url адрес файла обработчика
        data: z, //параметры запроса
        success: function (data) { //возвращаемый результат от сервера
            $('#rull').remove();
            $('#view').append(data);
        }
    });
}


function writeUser() {

    var z = $('#rull').serialize();
    $.ajax({
        type: 'post', //тип запроса: get,post либо head
        url: 'functions/regUser.php', //url адрес файла обработчика
        data: z, //параметры запроса
        success: function (data) { //возвращаемый результат от сервера
            alert(data);
        }
    });
}
