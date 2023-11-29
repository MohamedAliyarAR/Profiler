$(document).ready(function () {
    $("#lp").click(function () {
        window.location.href = "./login.html";
    });


    $(document).on('submit', '#registrationForm', function (e) {
        e.preventDefault();
        // console.log($(e.target).serialize());
        $.ajax({
            method: "POST",
            url: "./php/register.php",
            data: $(e.target).serialize(),
            dataType: 'json',
            success: (response) => {
                if (response.success) {
                    alert(response.success)
                    console.log($(e.target).serialize() + 'asdasdf');
                    window.location.href = "./login.html";
                } else {
                    console.log($(e.target).serialize());
                    alert(response.error);
                }
            }

        });
    });






    if (localStorage.getItem('loggedInEmail')) {
        window.location.href = './profile.html'
    }




});
