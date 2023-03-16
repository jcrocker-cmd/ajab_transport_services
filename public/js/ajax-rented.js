$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/rented/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#name').text(response.rented.name);
            $('#con_num').text(response.rented.con_num);
            $('#address').text(response.rented.address);
            $('#con_email').text(response.rented.con_email);
            $('#mode_del').text(response.rented.mode_del);
            $('#payment').text(response.rented.payment);

            $('#view_front_license img').attr('src', response.front_license);
            $('#view_back_license img').attr('src', response.back_license);

            $('#start_date').text(moment(response.rented.start_date).format('LL'));
            $('#start_time').text(moment(response.rented.start_time, 'HH:mm:ss').format('h:mm A'));


            $('#return_date').text(moment(response.rented.start_date).format('LL')); 
            $('#return_time').text(moment(response.rented.return_time, 'HH:mm:ss').format('h:mm A'));


            $('#msg').text(response.rented.msg);

            $('#car-brand').text(response.rented.car.brand);
            $('#car-model').text(response.rented.car.model);
            $('#car-vehicle').text(response.rented.car.vehicle);
            $('#car-year').text(response.rented.car.year);
            $('#car-transmission').text(response.rented.car.transmission);
            $('#car-plate').text(response.rented.car.plate);
            $('#date').text(moment(response.rented.updated_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
