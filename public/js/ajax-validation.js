

  $(function() {
    $('#signin_save').submit(function(e) {
      e.preventDefault(); // Prevent page from reloading
      $.ajax({
        url: "/signin", // Replace with your Laravel route for form submission
        type: "POST",
        data: $('#signin_save').serialize(),
        success: function(response) {
          if (response.success) {
            alert('You have successfully registered.');
            window.location.href = '/login'; // Redirect user to another page
          } else {
            alert(response.error);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle form submission error
          alert('Something went wrong. Please try again.');
        }
      });
    });
});
