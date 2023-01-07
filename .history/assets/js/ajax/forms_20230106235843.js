

$(document).ready(function () {
    $('#event_form').submit(function (event) {
        event.preventDefault();

        var title = $('#user_title').val();
        var type = $('#user_type').val();
        var date = $('#user_date').val();
        var start = $('#user_start').val();
        var end = $('#user_end').val();
        var desc = $('#user_desc').val();
        var image = $('#user_image').val();

        $.ajax({
            url: "post.php",
            type: "POST",
            data: {
                user_submit: 1,
                user_title: title,
                user_type: type,
                user_date: date,
                user_start: start,
                user_end: end,
                user_desc: desc,
                user_image: image
            },
            success: function (response) {
                console.log(response);
            }
        });
    });
});
