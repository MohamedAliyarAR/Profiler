
$(document).ready(function () {
    const email = localStorage.getItem('loggedInEmail');

    $('#email').val(email);


    // $.ajax({
    //     type: 'POST',
    //     url: 'php/profile.php',
    //     data: { 'email': email },
    //     dataType: 'json',
    //     success: function (response) {
    //         if (response.success) {
    //             // Fill the form with user data
    //             $('#name').val(response.data.name);
    //             $('#age').val(response.data.age);
    //             $('#dob').val(response.data.dob);
    //             $('#phonenumber').val(response.data.phonenumber);
    //             $('#email').val(response.data.email);
    //         } else {
    //             console.error('Error fetching user profile:', response.message);
    //         }
    //     },
    //     error: function (error) {
    //         console.error('Error fetching user profile:', error);
    //     }
    // });



    $(document).on('submit', '#profileForm',
        (e) => {
            e.preventDefault();

            const formData = {
                'name': $('#name').val(),
                'age': $('#age').val(),
                'dob': $('#dob').val(),
                'phonenumber': $('#phonenumber').val(),
                'email': $('#email').val()
                // }
            };

            $.ajax({

                type: 'POST',
                url: './php/profile.php',
                data: formData,
                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                },
                error: function (error) {

                    console.error('Error updating profile:', error);
                }
            });
        })

    $('.edit-icon').on('click', function () {

        var inputFieldId = $(this).data('input');

        var value = $(inputFieldId).val();

        var fieldName = $(inputFieldId).attr('name');

        var data = {
            fieldName: fieldName,
            value: value,
            'email': email
        };
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'php/profile.php',
            data: data,
            dataType: 'json',
            success: function (response) {

                alert(response.message);
            },
            error: function (xhr, status, error) {
                console.error('Error updating profile:', error);
            }
        });
    });


    $('#signout').click(function () {
        localStorage.removeItem('loggedInEmail')
        window.location.href = './index.html'
    })

})
