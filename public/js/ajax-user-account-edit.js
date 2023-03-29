

$(document).on('click', '.action-edit-info', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/account-info/' + id + '/ajaxedit',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#user_id').val(response.data.id);
            $('#edit_fname').val(response.data.first_name);
            $('#edit_lname').val(response.data.last_name);
            $('#edit_email').val(response.data.email);
            $('#edit_bday').val(response.data.bday);
            $('#edit_gender').val(response.data.gender);
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
