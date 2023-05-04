$(document).on('click', '.action-edit', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/edit-user-role/' + id + '/ajaxedit',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#user_id').val(response.user.id);
            $('#edit_fname').val(response.user.first_name);
            $('#edit_mname').val(response.user.middle_name);
            $('#edit_lname').val(response.user.last_name);
            $('#edit_email').val(response.user.email);

        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
