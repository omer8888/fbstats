$(document).ready(function(){
    $('#loginForm').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: formData,
            success: function(response){
                $('#message').html(response);
            }
        });
    });
});