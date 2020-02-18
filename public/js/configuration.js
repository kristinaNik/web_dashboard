$(document).ready(function () {

    // var currentCell = parseInt(event.currentTarget.firstElementChild.dataset.id);
    // var cellToAddToken = $(`[data-id='${currentCell}']`);

    $('.button_link').click(function(e) {
        if($(e.target).closest('a').length){
            alert('You clicked a link');
        } else {
            var button = $(this);
            add_config(button);

        }

    });

    function add_config(button) {

        $('#button_config').removeClass('hide');
        $("#add_configurations").on('click', function(e) {
            e.preventDefault();

            $("#color option:selected").each(function (index, elementColor) {
                var color = elementColor.value;
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
                        $(button.find('.plus_sign')).html('<a href="' + link + '" > + </a>')
                        $('#success_message').append("Successfully added a link");
                        // $( location ).attr("href", "/");
                    },
                    error: function (data, err) {
                        alert("error in adding link.");
                    },
                });
            })
        });
    }

});
