$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/view_ratings/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#car_brand').text(response.rating.car.brand);
            $('#car_model').text(response.rating.car.model);
            $('#car_vehicle').text(response.rating.car.vehicle);
            $('#car_year').text(response.rating.car.year);
            $('#car_transmission').text(response.rating.car.transmission);
            $('#car_plate').text(response.rating.car.plate);

            $('#name').text(response.rating.booking.name);
            $('#rating').text(response.rating.rating);
            $('#review').text(response.rating.rating_msg);


            $('#date').text(moment(response.rating.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
