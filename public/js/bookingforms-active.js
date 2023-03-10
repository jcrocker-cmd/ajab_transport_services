$(".booking-form-buttons button").on('click' , function(){
    $(".booking-form-buttons button.active").removeClass("active");
    $(this).addClass('active');
})