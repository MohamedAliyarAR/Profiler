// const fillIt = (storedData) => {
//     console.log(storedData);

// }
$(document).ready(function () {
    //     const fillFormWithUserData = ()
$(document).ready(function () {


    const email = localStorage.getItem('loggedInEmail');

    $('#email').val(email);


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
                url: 'php/profile.php',
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
            error: function (error) {

                console.error(error);
            }
        });
    });


    $('#signout').click(function () {
        localStorage.removeItem('loggedInEmail')
        window.location.href = './index.html'
    })

}) => {
    //         const storedData = { email: localStorage.getItem('email') }
    //         $.ajax({
    //             type: 'POST',
    //             url: 'php/profile.php',
    //             data: storedData,
    //             dataType: 'json',
    //             success: function (response) {
    //                 // if (response.success) {
    //                 console.log(response.message)
    //                 // }
    //             },
    //             error: function (error) {
    //                 console.error('Error updating profile:', error);
    //             }
    //         });

    //     }

    // fillFormWithUserData();

    const email = localStorage.getItem('loggedInEmail');

    $('#email').val(email);



    const postIt = (e) => {
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
            url: 'php/profile.php',
            data: formData,
            dataType: 'json',
            success: function (response) {

                alert(response.message);
            },
            error: function (error) {

                console.error('Error updating profile:', error);
            }
        });
    }

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
            error: function (error) {

                console.error(error);
            }
        });
    });


    $('#signout').click(function () {
        localStorage.removeItem('loggedInEmail')
        window.location.href = './index.html'
    })

})
