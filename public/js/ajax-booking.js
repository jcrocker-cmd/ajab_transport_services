$(document).on('click', '.action-view', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/bookings/' + id + '/ajaxview',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#name').text(response.booking.name);
            $('#con_num').text(response.booking.con_num);
            $('#address').text(response.booking.address);
            $('#con_email').text(response.booking.con_email);
            $('#mode_del').text(response.booking.mode_del);
            $('#payment').text(response.booking.payment);
            $('#form_type').text(response.booking.form_type);
            $('#total_amount_payable').text(new Intl.NumberFormat().format(response.booking.total_amount_payable));

            $('#view_front_license img').attr('src', response.front_license);
            $('#view_back_license img').attr('src', response.back_license);

            $('#start_date').text(moment(response.booking.start_date).format('LL'));
            $('#start_time').text(moment(response.booking.start_time, 'HH:mm:ss').format('h:mm A'));


            $('#return_date').text(moment(response.booking.start_date).format('LL')); 
            $('#return_time').text(moment(response.booking.return_time, 'HH:mm:ss').format('h:mm A'));


            $('#msg').text(response.booking.msg);

            $('#car-brand').text(response.booking.car.brand);
            $('#car-model').text(response.booking.car.model);
            $('#car-vehicle').text(response.booking.car.vehicle);
            $('#car-year').text(response.booking.car.year);
            $('#car-transmission').text(response.booking.car.transmission);
            $('#car-plate').text(response.booking.car.plate);
            $('#date').text(moment(response.booking.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
