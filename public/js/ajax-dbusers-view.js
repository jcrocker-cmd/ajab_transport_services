$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/view-user-role/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var fullName = response.user.first_name + " " + response.user.middle_name + " " + response.user.last_name;
            $('#view_full_name').text(fullName);
            $('#view_email').text(response.user.email);
            $('#view_con_num').text(response.user.con_num);
            $('#view_bday').text(response.user.view_bday);
            // Display user roles
            var rolesHtml = '';
            $.each(response.user.roles, function(index, role) {
                rolesHtml += role.name + '<br>';
            });
            $('#view_roles').html(rolesHtml);

        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});