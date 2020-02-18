$(document).ready(function () {

    // var currentCell = parseInt(event.currentTarget.firstElementChild.dataset.id);
    // var cellToAddToken = $(`[data-id='${currentCell}']`);

    $('.button_link').click(function(e) {
        // if($(e.target).closest('a').length){
        //     alert('You clicked a link');
        // }

        $('#button_config').removeClass('hide');
        var button = $(this);
        add_config(button);





    });

    function add_config(button) {


        $("#add_configurations").on('click', function(e) {
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
                        color: color
                    },
                    success: function (data) {
                        $('#success_message').append("Successfully added a link");
                        $(button.find('.plus_sign')).html('<a href="' + link + '" > + </a>')
                        $(button).css({"background-color" : colorText});
                    },
                    error: function (data, err) {
                        alert("error in adding link.");
                    },
                });
            })

        });

    }

});
