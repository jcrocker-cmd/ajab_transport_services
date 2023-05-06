$(document).on('click', '.action-view-ratings', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/user_view_ratings/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#rater_car_brand').text(response.rating.car.brand);
            $('#rater_car_model').text(response.rating.car.model);
            $('#rater_car_vehicle').text(response.rating.car.vehicle);
            $('#rater_car_year').text(response.rating.car.year);
            $('#rater_car_transmission').text(response.rating.car.transmission);

            $('#rater_name').text(response.rating.booking.name);
            $('#rater_rating').text(response.rating.rating);
            $('#rater_review').text(response.rating.rating_msg);


            $('#rater_date').text(moment(response.rating.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
