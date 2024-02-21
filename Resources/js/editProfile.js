// editProfile.js
$(document).ready(function () {
    $("#editProfileBtn").on("click", function () {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'editProfile.php',
            data: formData,
            success: function(response){
                $('#message').html(response);
                if (response === "edit successful!") {
                    // Redirect to index.php after successful login
                    window.location.href = "Myprofile.php";
                }
            }
        });
    });
});

