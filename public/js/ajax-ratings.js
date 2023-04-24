

$(document).on('click', '.action-rating', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/ratings/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#booking_id').val(response.rating.id);
            $('#car_id').val(response.rating.car_id);
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
