$(document).ready(function () {
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); 

        const formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $('#emailError').text('');
    $('#passwordError').text('');

        console.log(formData);

        $.ajax({
            url: 'login_handler.php', 
            type: 'POST',
            data: formData,
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    window.location.href = 'index.php'; 
                } else {
                    if (res.errorType === 'email') {
                        $('#emailError').text(res.message);
                    } else if (res.errorType === 'password') {
                        $('#passwordError').text(res.message);
                    }
                }
            },
            error: function () {
                alert('An error occurred. Please try again.');
            }
        });
    });
});