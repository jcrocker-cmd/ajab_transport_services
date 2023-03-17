// $(document).ready(function() {
//     $(window).scroll(function() {
//         const scrollUp = $('#scroll-up');
//         if ($(this).scrollTop() >= 200) {
//             scrollUp.addClass('show-scroll');
//         } else {
//             scrollUp.removeClass('show-scroll');
//         }
//     });
// });


$(document).ready(function() {
    $(window).scroll(function() {
      const scrollUp = $('#scroll-up');
      const scrollHeight = $(window).height() * 2; // set the scroll height to twice the viewport height
  
      if ($(this).scrollTop() >= scrollHeight) {
        // show the scroll button if the scroll height is reached
        scrollUp.addClass('show-scroll');
      } else {
        // hide the scroll button if the scroll height is not reached
        scrollUp.removeClass('show-scroll');
      }
    });
  });
  