$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/inquiry/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#name').text(response.inquiry.name);
            $('#phone').text(response.inquiry.phone);
            $('#email').text(response.inquiry.email);
            $('#subject').text(response.inquiry.subject);
            $('#content').text(response.inquiry.content);
            $('#date').text(moment(response.inquiry.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
