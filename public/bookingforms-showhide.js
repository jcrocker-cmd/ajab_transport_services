jQuery(function() {
    // jQuery(".btn-daily").click(function(){
    //     jQuery(".single").show();
    // });
    jQuery(".button").click(function(){
        jQuery(".single").hide();
        jQuery(".div"+ $(this).attr('target')).show();
    });
});