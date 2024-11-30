$(document).ready(function() {
    $('.vote-button').on('click', function() {
        var employeeId = $(this).data('employee-id');

        var categoryId = $('#category_id_' + employeeId).val();
        var comment = $('#comment_' + employeeId).val().trim();

        console.log("Category ID value: ", categoryId);
        console.log("Comment value: ", comment);

        $('#categoryError_' + employeeId).hide();
        $('#commentError_' + employeeId).hide();

        var isValid = true;
        if (!categoryId) {
            $('#categoryError_' + employeeId).text('Please select a category.').show();
            isValid = false;
        }

        if (comment === '') {
            $('#commentError_' + employeeId).text('Please enter a comment.').show();
            isValid = false;
        }

        if (isValid) {
            var formData = $('#voteForm' + employeeId).serialize();
            console.log("Serialized Form Data: ", formData);

            $.ajax({
                url: 'vote_handler.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log("Response: ", response);
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message,
                        });
                        $('#voteForm' + employeeId)[0].reset(); 
                        $('#voteModal' + employeeId).modal('hide'); 
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message,
                        });
                    }
                },
                error: function(xhr, status, error) {

                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: 'There was an error submitting your vote. Please try again.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#voteForm' + employeeId)[0].reset();
                        $('#voteModal' + employeeId).modal('hide');
                    });
                }
            });
        }
    });
});