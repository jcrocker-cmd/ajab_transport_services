$(function() {
    // Handle form submission
    $("#password-form").submit(function(event) {
      event.preventDefault();
      var password = $("#password-input").val();
  
      // Send password to server for validation
      $.ajax({
        url: "/validate-password",
        method: "POST",
        data: { password: password },
        success: function(response) {
          if (response.valid) {
            // Password is correct, create new user role
            $.ajax({
              url: "/create-user-role",
              method: "POST",
              data: $("#user-role-form").serialize(),
              success: function() {
                // Close modal and show success message
                $("#password-modal").modal("hide");
                alert("User role created successfully.");
              }
            });
          } else {
            // Password is incorrect, show error message
            alert("Incorrect password.");
          }
        }
      });
    });
  });
  