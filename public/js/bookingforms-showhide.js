// jQuery(function() {
//     // jQuery(".btn-daily").click(function(){
//     //     jQuery(".single").show();
//     // });
//     jQuery(".button").click(function(){
//         jQuery(".single").hide();
//         jQuery(".div"+ $(this).attr('target')).show();
//     });
// });


jQuery(function() {
    jQuery(".button").click(function(){
        // Disable all inputs in the hidden forms
        jQuery(".single :input").prop('disabled', true);
        
        // Enable inputs in the selected form
        jQuery(".div"+ $(this).attr('target') + " :input").prop('disabled', false);
        
        // Hide all forms except the selected one
        jQuery(".single, .div").not(".div"+ $(this).attr('target')).hide();
        jQuery(".div"+ $(this).attr('target')).show();
    });
});
