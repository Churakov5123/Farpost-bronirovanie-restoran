$(document).ready(function () {
    // Проверка Name
    if (document.getElementById('name')) {
        var inputName = document.getElementById('name');
        inputName.onkeyup = function () {
            this.value = this.value.replace(/[^а-яa-zА-ЯA-Z\ ]/g, '')
        };
    }
    // Проверка Phone
    if (document.getElementById('tel')) {
        var inputTel = document.getElementById('tel');
        inputTel.onkeyup = function () {
            this.value = this.value.replace(/[^0-9\-+]/g, '')
        };
    }
    var start = (parseInt($("#days option:selected").attr("data-start")));
    var end = (parseInt($("#days option:selected").attr("data-end")));
    var minutes = ($("#minutes option:selected").val());
    var raz = $("#raz").val();
    console.log(raz);
    console.log("111");

    // Запуск при загрузке первоначальной
    option(start, end);
    maxHouer();

    $("#form").on('click', '.clock', function () {
        //resetClock();
        raz = $("#raz").val(); console.log(raz);
        return raz;
    });

    function maxHouer() {
        $("#raz").attr('max', 1);
        var sta = (parseInt($("#hour option:selected").val()));
        var end = (parseInt($("#days option:selected").attr("data-end")));
        var minutes = ($("#minutes option:selected").val());
        var maxraz = end - sta;
        $("#raz").attr('max', maxraz);
    }

    // сброс и расчет продолжительности часов заказа
    function resetClock() {
        maxHouer();
        workHour();
        raz = $("#raz").val();
        return raz;
    }

    // вычесления продолжительности рабочего дня
    function workHour() {
        var start = (parseInt($("#days option:selected").attr("data-start")));
        var end = (parseInt($("#days option:selected").attr("data-end")));
        var raz = ($("#raz").val());
        end = end - raz;
        if (start < end) {
            var raz = ($("#raz").val(raz));
            option(start, end);
        }
    }

    // добавление часов раб дня
    function option(start, end) {
        $('#hour').html("");
        while (start < end) {
            $('#hour').append($("<option></option>", {value: start, text: start + ":00"}));
            start++;
        }
    }

    // изменения часов раб дня в зависимости от времени
    $(document).mouseup(function (e) {
        var divD = $("#days");
        var start = (parseInt($("#days option:selected").attr("data-start")));
        var end = (parseInt($("#days option:selected").attr("data-end")));
        if (divD.is(e.target)) {
            option(start, end);
            $("#raz").val(1);
            resetClock();
        }

    });
    // сброс Продолжительность в часах при выборе времени
    $(document).mouseup(function (e) {
        var divD = $("#hour");
        if (divD.is(e.target)) {
            $("#raz").val(1);
            maxHouer();
        }

    });

    // AJAX
    $("#form").submit(function () {
        $.ajax({
            type: "POST",
            url: "/order",
            data:  $(this).serialize(),
            success(data) {
                alert(data);
            }
        }).done(function () {
            $(this).find("input").val("");
            $("#form").trigger("reset");
            // alert('Ваш стол забронирован');
            // document.location.href='/spasibo';
        });
        return false;
    });
});
// проверка уведомления
function error() {
    alert('Стол занят');
}
function start() {
    alert('Стол зарезервирован');
}


