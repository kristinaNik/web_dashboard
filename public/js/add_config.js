$(document).ready(function () {

    $("#add_configurations").on('click', function (e) {

        e.preventDefault();


        $("#color option:selected").each(function (index, elementColor) {

            var color = elementColor.value;
            var colorText = elementColor.text;
            var title = $("input[name=title]").val();
            var link = $("input[name=link]").val();

            $.ajax({
                type: 'POST',
                url: "api/configurations",
                data: {
                    title: title,
                    link: link,
                    color: color,
                },
                success: function (data) {
                    $('#success_message').append("Successfully added a link");
                    // $(button.find('.plus_sign')).html('<a href="' + link + '" > + </a>')
                    // $(button).css({"background-color": colorText});
                },
                error: function (data, err) {
                    alert("error in adding link.");
                },
            });
        })

    });

});
