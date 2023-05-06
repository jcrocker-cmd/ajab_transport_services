

  // add a custom method to check the file size
  $.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000000);
  }, 'File size must be less than {0} MB.');

  $.validator.addMethod('filetype', function(value, element, param) {
    var fileType = element.files[0].type;
    return this.optional(element) || (fileType === 'image/jpeg' || fileType === 'image/png');
  }, 'File must be a JPEG or PNG image.');



  // Add custom methods for start and return dates and times
$.validator.addMethod('startdate', function(value, element) {
    var startDate = new Date(value);
    var today = new Date();
    return startDate >= today;
  }, 'Start date cannot be in the past.');
  

  $.validator.addMethod('returndate', function(value, element) {
    var returnDate = new Date(value);
    var startDate = new Date($('#startdate').val());
    return returnDate >= startDate;
  }, 'Return date must be after start date.');
  
  


  $(document).ready(function() {
    // initialize the validator
    var validator = $('#daily_bookingForm').validate({
      rules: {
        front_license: {
          required: true,
          filesize: 1,
          filetype: true
        },
        back_license: {
          required: true,
          filesize: 1,
          filetype: true
        },
        start_date: {
            required: true,
            startdate: true
          },
          start_time: {
            required: true
          },
          return_date: {
            required: true,
            returndate: true
          },
          return_time: {
            required: true
          }
      },
      messages: {
        front_license: {
          required: 'Please select a file.',
          filesize: 'File size must be less than 1 MB.',
          filetype: 'File must be a JPEG or PNG image.'
        },
        back_license: {
          required: 'Please select a file.',
          filesize: 'File size must be less than 1 MB.',
          filetype: 'File must be a JPEG or PNG image.'
        },
        start_date: {
            required: 'Please enter a start date.'
          },
          start_time: {
            required: 'Please enter a start time.'
          },
          return_date: {
            required: 'Please enter a return date.'
          },
          return_time: {
            required: 'Please enter a return time.'
          }
        
      },
      errorPlacement: function(error, element) {
        if (element.attr("name") === "front_license") {
          error.insertAfter(element.next('#errorfront'));
        } else if (element.attr("name") === "back_license") {
          error.insertAfter(element.next('#errorback'));
        }  else if (element.attr("name") === "start_date") {
            error.insertAfter(element.next('#errorsd'));
          } else if (element.attr("name") === "start_time") {
            error.insertAfter(element.next('#errorst'));
          } else if (element.attr("name") === "return_date") {
            error.insertAfter(element.next('#errorrd'));
          } else if (element.attr("name") === "return_time") {
            error.insertAfter(element.next('#errorrt'));
          }     
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  
    // validate the form fields before submitting
    $('#daily_bookingForm').on('submit', function() {
      return validator.form();
    });
  
    // validate the form fields on change and blur events
    $('#front_license, #back_license, #startdate, #starttime, #returndate, #returntime').on('change blur', function() {
      validator.element(this);
    });
  });


