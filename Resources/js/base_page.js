document.addEventListener("DOMContentLoaded", function() {
    var myAccount = document.getElementById("myAccount");

    myAccount.addEventListener("click", function() {
        myAccount.classList.toggle("open");
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
        if (!myAccount.contains(event.target)) {
            myAccount.classList.remove("open");
        }
    });
});