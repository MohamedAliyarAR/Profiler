$("#lp").click(function () {
    window.location.href = "./login.html";
});

const email = localStorage.getItem('loggedInEmail');

$('#email').val(email);

if (!email) {
    window.location.href = './index.html'
}

$(document).ready(function () {
    $(document).on('submit', '#profileForm', postIt);

});

$('#signout').click(function () {
    localStorage.removeItem('loggedInEmail')
    window.location.href = './index.html'
})

const postIt = (e) => {
    e.preventDefault();
    $.ajax({

        type: 'POST',
        url: 'php/profile.php', 
        data: {
            'name': $('#name').val(),
            'age': $('#age').val(),
            'dob': $('#dob').val(),
            'phonenumber': $('#phonenumber').val(),
            'email': $('#email').val()
        },
        dataType: 'json',
        success: function (response) {
            // Handle success response (e.g., display a success message)
            alert(response.message);
        },
        error: function (error) {
            // Handle error response (e.g., display an error message)
            console.error('Error updating profile:', error);
        }
    });

}
