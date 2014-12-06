$(document).ready(function () {
    $('.field.error input,.field.error .checkbox').hover(function () {
        $(this).next('div.prompt').addClass('visible');
    }, function () {
        $(this).next('div.prompt').removeClass('visible');
    });
    disableDay($('#month').val(), $('#year').val());
    $('#month,#year').change(function (e) {
        var month, year, currentData, target, isMonth, isYear;
        target = $(e.target);
        isMonth = target.is('select#month');
        isYear = target.is('select#year');
        currentData = $(this).val();
        month = isMonth ? currentData : $("#month").val();
        year = isYear ? currentData : $("#year").val();

        disableDay(month, year);
        $('#day option').not(':first').remove();
        if (month != "" && year != "" || 0 < month < 13) {
            var day = getDayInMonth(year, month);
            if (day > 0) {
                for (var i = 1; i <= day; i++) {
                    $('#day').append($("<option></option>").attr("value", i).text(i));
                }
            }
            return;
        }
    });

    function getDayInMonth(year, month) {
        var day = new Date(year, month, 0);
        return day.getDate();
    }

    function disableDay(month, year) {
        var disable = !!(month == "" || year == "");
        $('#day').prop('disabled', disable);
    }
});