$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/user/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#name').text(response.user.first_name + ' ' + response.user.last_name);
            $('#email').text(response.user.email);
            $('#social_type').text(response.user.social_type);
            $('#bday').text(response.user.bday);
            $('#gender').text(response.user.gender);
            $('#date').text(moment(response.user.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
