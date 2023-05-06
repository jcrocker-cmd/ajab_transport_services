$(document).ready(function() {
    $('#btnNavigate').on('click', function() {
      var slug = 'example-page'; // Replace with your slug
      $.ajax({
        type: 'GET',
        url: '/' + slug,
        success: function(data) {
          $('#content').html(data); // Replace #content with the ID of the element where you want to display the new page content
        },
        error: function() {
          alert('Error loading page'); // Replace with your error handling code
        }
      });
    });
  });
  