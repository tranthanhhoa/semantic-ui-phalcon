$(document).ready(function () {
    $('.field.error input,.field.error .checkbox').hover(function () {
        $(this).next('div.prompt').addClass('visible');
    }, function () {
        $(this).next('div.prompt').removeClass('visible');
    });
    disableSelect($('#year').val());
    $('#month,#year').change(function (e) {
        var month, year, currentData;
        currentData = $(this).val();

        if ($(e.target).is("select#month")) {
            month = currentData;
            year = $("#year").val();
        } else {
            month = $("#month").val();
            year = currentData;
        }
        disableSelect(year);
        if (month != "" && year != "") {
            $.ajax({
                url: '/show-day',
                type: 'POST',
                data: {"month": month, "year": year},
                success: function (result) {
                    $('#day option').not(':first').remove();
                    if(result > 0){
                        for (var i = 1; i <= result; i++) {
                            $('#day').append($("<option></option>").attr("value", i).text(i));
                        }
                    }
                    return;
                }
            });
        }
    });

    function disableSelect(year) {
        if (year === "") {
            $('#month').prop('disabled', 'disabled');
            $('#day').prop('disabled', 'disabled');
        } else {
            $('#month').prop('disabled', false);
            $('#day').prop('disabled', false);
        }
    }
});