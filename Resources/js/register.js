$(document).ready(function(){
    $('#signupForm').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: formData,
            success: function(response){
                // Check if registration was successful
                if(response.trim() === "success") {
                    // Redirect to home.php in a full-screen window
                    window.location.href = "home.php";
                } else {
                    // Display error message
                    $('#message').html(response);
                }
            }
        });
    });
});