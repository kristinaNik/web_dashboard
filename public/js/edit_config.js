$(document).ready(function () {

    $("#edit_configurations").on('click', function (e) {
        e.preventDefault();

        var pathname = window.location.pathname.split("/");
        var id = pathname[pathname.length-1];

        $("#color option:selected").each(function (index, elementColor) {

            var color = elementColor.value;
            var colorText = elementColor.text;
            var title = $("input[name=title]").val();
            var link = $("input[name=link]").val();

            $.ajax({
                type: 'PUT',
                url: "api/configurations/" + id,
                data: {
                    title: title,
                    link: link,
                    color: color,
                },
                success: function (data) {
                    $('#success_message').append("Successfully edited a link");
                },
                error: function (data, err) {
                    alert("error in adding link.");
                },
            });
        })

    });

});
