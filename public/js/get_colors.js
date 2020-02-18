$(document).ready(function () {
    $.ajax({
        type:'GET',
        url:'api/colors',
        success:function(data) {
            var optionHTML = '';

            $.each(data, function (i, item) {
                var counter = 1;
                $.each(item, function (j, color_data) {
                    dataNum = item.length;
                    if (counter <= dataNum) {
                        optionHTML += '<option value="' + color_data.id + '">' + color_data.color + '</option>';
                    }
                    counter++;
                });

            });

            $(' #color').append(optionHTML);

        }
    });
});
