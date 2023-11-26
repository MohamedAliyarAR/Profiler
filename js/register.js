$("#lp").click(function () {
    window.location.href = "./login.html";
});

$(document).ready(function () {
    $(document).on('submit', '#registrationForm', sqlInsertOp);

});

const sqlInsertOp = (e) => {

    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "php/register.php",
        data: $(e.target).serialize(),
        dataType: 'json',
        success: (response) => {
            if (response.success) {
                alert(response.success)
                window.location.href = "./login.html";
            } else {
                alert(response.error);
            }
        },
    });
};

