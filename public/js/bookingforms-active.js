$(".booking-form-buttons a").on('click' , function(){
    $(".booking-form-buttons a.active").removeClass("active");
    $(this).addClass('active');
})