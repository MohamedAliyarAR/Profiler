
$("#lp").click(function () {
    window.location.href = "./login.html";
});



$("#rp").click(function () {
    window.location.href = "./register.html";
});

if (localStorage.getItem('loggedInEmail')) {
    window.location.href = './profile.html'
}

$(document).ready(function () {



    $(document).on('submit', '#registrationForm', function (e) {
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "php/login.php",
            data: $(this).serialize(),
            dataType: 'json',
            success: (response) => {
                if (response.success) {
                    const userEmail = response.email;
                    localStorage.setItem('loggedInEmail', userEmail);

                    window.location.href = "./profile.html";
                }
                else {
                    alert(response.error)
                }
            },

        });
    });
})
