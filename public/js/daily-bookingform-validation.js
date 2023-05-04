
// const form = document.querySelector('#daily_bookingForm');
// const nameInput = document.querySelector('#name');

// form.addEventListener('submit', (event) => {
//   event.preventDefault();

//   const name = nameInput.value;

//   if (validator.isEmpty(name)) {
//     document.querySelector('#errorname').textContent = 'Please enter your full name';
//     return;
//   }

//   if (!validator.isLength(name, { min: 3, max: 100 })) {
//     document.querySelector('#errorname').textContent = 'Name must be between 3 and 100 characters';
//     return;
//   }

//   // If all validations pass, submit the form
//   form.submit();
// });





// $(function() {

//   // Get the form element
//   var form = $("#daily_bookingForm");

//   // Get the input elements
//   var input1 = $("#name");
//   var input2 = $("#number");
//   var input3 = $("#address");
//   var input4 = $("#email");

//   var input5  = $("#front_license");
//   var input6  = $("#back_license")


//   var startdate = $("#startdate");
//   var starttime = $("#starttime");
//   var returndate = $("#returndate");
//   var returntime = $("#returntime");

//   var accept = $("#accept");


//   // Get the error message elements
//   var error1 = $("#errorname");
//   var error2 = $("#errornum");
//   var error3 = $("#erroradd");
//   var error4 = $("#erroremail");

//   var errorcashbond = $("#errorcash");

//   var errorfront = $("#fileErrorFront");
//   var errorback = $("#fileErrorBack");
//   var erroragree = $("#erroragree");

//   // Add a submit event listener to the form
//   form.on("submit", function(event) {
//     event.preventDefault(); // prevent the form from submitting

//     // Reset the error messages
//     input1.on("keyup", function() {
//       error1.text(""); // reset the error message
//       input1.css("border-color", "");
//     });

//     input2.on("keyup", function() {
//       error2.text(""); // reset the error message
//       input2.css("border-color", "");
//     });

//     input3.on("keyup", function() {
//       error3.text(""); // reset the error message
//       input3.css("border-color", "");
//     });
//     input4.on("keyup", function() {
//       error4.text(""); // reset the error message
//       input4.css("border-color", "");
//     });

//     input5.on("change", function() {
//       errorfront.text(""); // reset the error message
//       input5.css("border-color", "");
//       if (!validateImageSize(input5)) {
//         errorfront.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//         input5.css("border-color", "red");
//       }
//       if (!validateImageType(input5)) {
//         errorfront.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//         input5.css("border-color", "red");
//       }
//     });


//     input6.on("change", function() {
//       errorback.text(""); // reset the error message
//       input6.css("border-color", "");
//       if (!validateImageSize(input6)) {
//         errorback.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//         input6.css("border-color", "red");
//       }
//       if (!validateImageType(input6)) {
//         errorback.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//         input6.css("border-color", "red");
//       }
//     });

//     cashbond.on("change", function() {
//       if(cashbond.checked){
//         erroragree.text("");
//         cashbond.style.borderColor = "";
//       }
//     });



//     accept.on("change", function() {
//       if(accept.checked){
//         erroragree.text("");
//         accept.style.borderColor = "";
//       }
//     });

//     // validate the input fields

//     // validate the input fields
//     if (input1.val() === "") {
//       error1.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;'>This field is required.</p>");
//       input1.style.borderColor = "red";
//     }
  
//     if (input2.val() === "") {
//       error2.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//       input2.style.borderColor = "red";
//     }
//     if (input3.val() === "") {
//       error3.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//       input3.style.borderColor = "red";
//     }
//     if (input4.val() === "") {
//       error4.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//       input4.style.borderColor = "red";
//     }

//     if (input5.val() === "") {
//       errorfront.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload front page of your license.</p>");
//       input5.style.borderColor = "red";
//     } else {
//       errorfront.text(""); // reset the error message
//       input5.style.borderColor = "";
//       if (!validateImageSize(input5)) {
//         errorfront.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//         input5.style.borderColor = "red";
//       }
//       if (!validateImageType(input5)) {
//         errorfront.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//         input5.style.borderColor = "red";
//       }
//     }


//     if (input6.val() === "") {
//       errorback.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload back page of your license.</p>");
//       input6.style.borderColor = "red";
//     } else {
//       errorback.text(""); // reset the error message
//       input6.style.borderColor = "";
//       if (!validateImageSize(input6)) {
//         errorback.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//         input6.style.borderColor = "red";
//       }
//       if (!validateImageType(input6)) {
//         errorback.text("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//         input6.style.borderColor = "red";
//       }
//     }


//     if (!accept.checked){
//       erroragree.innerHTML = "<p class='err-text' >You need to agree our terms privacy and policy.</p>";
//       accept.style.borderColor = "red";
//     }


//     // If all the fields are valid, submit the form
//     if (error1.text() === "" 
//       && error2.text() === "" 
//       && error3.text() === "" 
//       && error4.text() === ""
//       && errorfront.text() === ""
//       && errorback.text() === ""
//       && erroragree.text() === ""
//     ) {
//       this.innerHTML = "<div class='loader'></div>";
//       this.disabled = true;
//       form.submit();
//       submit_btn.style.backgroundColor = "#89e5ba";
//     }
//   }
  
// )});




// // Get the form element
// var form = $("#daily_bookingForm");

// // Get the input elements
// var input1 = $("#name");
// var input2 = $("#number");
// var input3 = $("#address");
// var input4 = $("#email");

// var input5 = $("#front_license");
// var input6 = $("#back_license");

// var cashbond = $("#cashbond");

// var startdate = $("#startdate");
// var starttime = $("#starttime");
// var returndate = $("#returndate");
// var returntime = $("#returntime");

// var accept = $("#accept");

// // Get the error message elements
// var error1 = $("#errorname");
// var error2 = $("#errornum");
// var error3 = $("#erroradd");
// var error4 = $("#erroremail");

// var errorcashbond = $("#errorcash");

// var errorfront = $("#fileErrorFront");
// var errorback = $("#fileErrorBack");
// var erroragree = $("#erroragree");

// // Add a submit event listener to the form
// form.on("submit", function(event) {
// event.preventDefault(); // prevent the form from submitting

// // Reset the error messages
// input1.on("keyup", function() {
// error1.html(""); // reset the error message
// input1.css("border-color", "");
// });

// input2.on("keyup", function() {
// error2.html(""); // reset the error message
// input2.css("border-color", "");
// });

// input3.on("keyup", function() {
// error3.html(""); // reset the error message
// input3.css("border-color", "");
// });

// input4.on("keyup", function() {
// error4.html(""); // reset the error message
// input4.css("border-color", "");
// });

// input5.on("change", function() {
// errorfront.html(""); // reset the error message
// input5.css("border-color", "");
// if (!validateImageSize(input5[0])) {
// errorfront.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
// input5.css("border-color", "red");
// }
// if (!validateImageType(input5[0])) {
// errorfront.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
// input5.css("border-color", "red");
// }
// });

// input6.on("change", function() {
// errorback.html(""); // reset the error message
// input6.css("border-color", "");
// if (!validateImageSize(input6[0])) {
// errorback.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
// input6.css("border-color", "red");
// }
// if (!validateImageType(input6[0])) {
// errorback.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
// input6.css("border-color", "red");
// }
// });

// cashbond.on("errorcash", function(){
// if(cashbond.is(":checked")){
// erroragree.html("");
// cashbond.css("border-color", "");
// }
// });

// accept.on("change", function(){
// if(accept.is(":checked")){
// erroragree.html("");
// accept.css("border-color", "");
// }
// });

// // validate the input fields
// if (input1.val() === "") {
//   error1.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//   input1.css("border-color", "red");
//   }
  
//   if (input2.val() === "") {
//   error2.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//   input2.css("border-color", "red");
//   }
  
//   if (input3.val() === "") {
//   error3.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//   input3.css("border-color", "red");
//   }
  
//   if (input4.val() === "") {
//   error4.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>");
//   input4.css("border-color", "red");
//   }
  
//   if (input5.val() === "") {
//   errorfront.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload front page of your license.</p>");
//   input5.css("border-color", "red");
//   } else {
//   errorfront.html(""); // reset the error message
//   input5.css("border-color", "");
//   if (!validateImageSize(input5)) {
//   errorfront.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//   input5.css("border-color", "red");
//   }
//   if (!validateImageType(input5)) {
//   errorfront.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//   input5.css("border-color", "red");
//   }
//   }
  
//   if (input6.val() === "") {
//   errorback.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload back page of your license.</p>");
//   input6.css("border-color", "red");
//   } else {
//   errorback.html(""); // reset the error message
//   input6.css("border-color", "");
//   if (!validateImageSize(input6)) {
//   errorback.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>");
//   input6.css("border-color", "red");
//   }
//   if (!validateImageType(input6)) {
//   errorback.html("<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>");
//   input6.css("border-color", "red");
//   }
//   }
  
//   cashbond.on("change", function() {
//   if (cashbond.prop("checked")) {
//   erroragree.html("");
//   cashbond.css("border-color", "");
//   }
//   });
  
//   accept.on("change", function() {
//   if (accept.prop("checked")) {
//   erroragree.html("");
//   accept.css("border-color", "");
//   }
//   });
  
//   }); // end form submit event listener function


  


// $(function() {
//   // Add custom validation methods
//   function filesize(value, element, param) {
//     return this.optional(element) || (element.files[0].size <= param * 1000000);
//   }

//   function filetype(value, element, param) {
//     var fileType = element.files[0].type;
//     return this.optional(element) || (fileType === 'image/jpeg' || fileType === 'image/png');
//   }

//   function startdate(value, element) {
//     return new Date(value) >= new Date();
//   }

//   function returndate(value, element) {
//     var startdate = $('#start_date').val();
//     return new Date(value) > new Date(startdate);
//   }

//   // Validate the form
//   $('#daily_bookingForm').validate({
//     rules: {
//       front_license: {
//         required: true,
//         filesize: 1,
//         filetype: true
//       },
//       back_license: {
//         required: true,
//         filesize: 1,
//         filetype: true
//       },
//       start_date: {
//         required: true,
//         startdate: true
//       },
//       return_date: {
//         required: true,
//         returndate: true
//       }
//     },
//     messages: {
//       front_license: {
//         required: 'Please select a file.',
//         filesize: 'File size must be less than 1 MB.',
//         filetype: 'File must be a JPEG or PNG image.'
//       },
//       back_license: {
//         required: 'Please select a file.',
//         filesize: 'File size must be less than 1 MB.',
//         filetype: 'File must be a JPEG or PNG image.'
//       },
//       start_date: {
//         required: 'Start date is required.'
//       },
//       return_date: {
//         required: 'Return date is required.'
//       }
//     },
//     errorPlacement: function(error, element) {
//       if (element.attr("name") === "front_license") {
//         error.insertAfter(element.next('#fileErrorFront'));
//       } else if (element.attr("name") === "back_license") {
//         error.insertAfter(element.next('#fileErrorBack'));
//       } else if (element.attr("name") === "start_date") {
//         error.insertAfter(element.next('#errorsd'));
//       } else if (element.attr("name") === "return_date") {
//         error.insertAfter(element.next('#errorrd'));
//       }
//     },
//     submitHandler: function(form) {
//       form.submit();
//     }
//   });

//   // Validate the image on change
//   $('#front_license, #back_license').on('change', function() {
//     $(this).valid();
//   });
// });

// FormValidation.formValidation(
//   document.getElementById('daily_bookingForm'),
//   {
//     plugins: {
//       // initialize the plugins
//       trigger: new FormValidation.plugins.Trigger(),
//       submitButton: new FormValidation.plugins.SubmitButton(),
//       // and use the Bootstrap plugin
//       bootstrap: new FormValidation.plugins.Bootstrap(),
//     },
//     fields: {
//       front_license: {
//         validators: {
//           file: {
//             extension: 'jpeg,png',
//             maxSize: 1048576,
//             message: 'The selected file is not valid',
//           },
//         },
//       },
//     },
//   }
// );
// Add custom validation for file size
// var maxSize = 1; // MB
// $('#front_license, #back_license').on('change', function() {
//   if (this.files[0].size > maxSize * 1000000) {
//     $(this).removeClass('is-valid').addClass('is-invalid');
//   } else {
//     $(this).removeClass('is-invalid').addClass('is-valid');
//   }
// });






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



  

//   $(document).ready(function() {
//     // Attach a function to the form's submit event
//     $("#daily_bookingForm").submit(function(event) {
//       // Get the start and return date values
//       var startdate = new Date($("#startdate").val());
//       var returndate = new Date($("#returndate").val());
  
//       // Get the start and return time values
//       var starttime = $("#starttime").val();
//       var returntime = $("#returntime").val();
  
//       // Get the current date
//       var currentdate = new Date();
  
//       // Set the minimum start date to tomorrow
//       var mindate = new Date();
//       mindate.setDate(mindate.getDate() + 1);
  
//       // Check if the start date is valid
//       if (startdate < mindate) {
//         $("#errorsd").text("Start date must be at least 1 day from today.");
//         event.preventDefault();
//       } else {
//         $("#errorsd").text("");
//       }
  
//       // Check if the return date is valid
//       if (returndate <= startdate) {
//         $("#errorrd").text("Return date must be after start date.");
//         event.preventDefault();
//       } else {
//         $("#errorrd").text("");
//       }
  
//       // Check if the start time is set
//       if (starttime === "") {
//         $("#errorst").text("Start time is required.");
//         event.preventDefault();
//       } else {
//         $("#errorst").text("");
//       }
  
//       // Check if the return time is set
//       if (returntime === "") {
//         $("#errorrt").text("Return time is required.");
//         event.preventDefault();
//       } else {
//         $("#errorrt").text("");
//       }
//     });
//   });


  

// $(document).ready(function() {
//     // add event listener for file input change
//     $('#front_license, #back_license').on('change', function() {
//         var file = $(this).prop('files')[0];
//         var fileSize = file ? file.size / 1024 / 1024 : 0; // convert file size to MB
//         var allowedTypes = ['image/jpeg', 'image/png'];

//         // validate file type and size
//         if (file && $.inArray(file.type, allowedTypes) == -1) {
//             $(this).val('');
//             $(this).next('.error').html('Invalid file type. Please upload an image file.');
//         } else if (fileSize > 1) {
//             $(this).val('');
//             $(this).next('.error').html('File size exceeds 1MB limit.');
//         } else {
//             $(this).next('.error').html('');
//         }

//         // check if file is empty
//         if (!file) {
//             $(this).next('.error').html('This field is required.');
//         }
//     });

//     // add form submission listener
// // add form submission listener
// $('#daily_bookingForm').on('submit', function(e) {
//     // check if front license field is empty or has errors
//     var frontFile = $('#front_license').prop('files')[0];
//     if (!frontFile || $('#errorfront').html() != '') {
//         e.preventDefault(); // prevent form submission
//         $('#errorfront').html('Please upload a valid front license image file.');
//     }

//     // check if back license field is empty or has errors
//     var backFile = $('#back_license').prop('files')[0];
//     if (!backFile || $('#errorback').html() != '') {
//         e.preventDefault(); // prevent form submission
//         $('#errorback').html('Please upload a valid back license image file.');
//     }
// });

// });














// // Get the form element
// var form = document.getElementById("daily_bookingForm");

// // Get the input elements
// var input1 = document.getElementById("name");
// var input2 = document.getElementById("number");
// var input3 = document.getElementById("address");
// var input4 = document.getElementById("email");

// var input5  = document.getElementById("front_license")
// var input6  = document.getElementById("back_license")

// var input7 = document.getElementById("cashbond");

// var radio1 = document.getElementById("opt1");
// var radio2 = document.getElementById("opt2");
// var radio3 = document.getElementById("opt3");
// var radio4 = document.getElementById("opt4");
// var radio5 = document.getElementById("opt5");

// var pay1 = document.getElementById("pay1");
// var pay2 = document.getElementById("pay2");
// var pay3 = document.getElementById("pay3");

// var startdate = document.getElementById("startdate");
// var starttime = document.getElementById("starttime");
// var returndate = document.getElementById("returndate");
// var returntime = document.getElementById("returntime");



// // Get the error message elements
// var error1 = document.getElementById("errorname");
// var error2 = document.getElementById("errornum");
// var error3 = document.getElementById("erroradd");
// var error4 = document.getElementById("erroremail");

// var errorfront = document.getElementById("errorfront");
// var errorback = document.getElementById("errorback");

// var error5 = document.getElementById("errorcash");
// var error6 = document.getElementById("errorradio");
// var errorpay = document.getElementById("errorpay");

// var errorsd = document.getElementById("errorsd");
// var errorst = document.getElementById("errorst");
// var errorrd = document.getElementById("errorrd");
// var errorrt = document.getElementById("errorrt");


// document.getElementById("errorsd").style.display = "none";
// document.getElementById("errorst").style.display = "none";
// document.getElementById("errorrd").style.display = "none";
// document.getElementById("errorrt").style.display = "none";



// // Add a submit event listener to the form
// form.addEventListener("submit", function(event) {
//   event.preventDefault(); // prevent the form from submitting

//   // Reset the error messages
//   input1.addEventListener("keyup", function() {
//     error1.innerHTML = ""; // reset the error message
//     input1.style.borderColor = "";
// });

// input2.addEventListener("keyup", function() {
//     error2.innerHTML = ""; // reset the error message
//     input2.style.borderColor = "";
// });

// input3.addEventListener("keyup", function() {
//     error3.innerHTML = ""; // reset the error message
//     input3.style.borderColor = "";
// });
// input4.addEventListener("keyup", function() {
//     error4.innerHTML = ""; // reset the error message
//     input4.style.borderColor = "";
// });

//   input5.addEventListener("change", function() {
//     errorfront.innerHTML = ""; // reset the error message
//     input5.style.borderColor = "";
//     if (!validateImageSize(input5)) {
//       errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>";
//       input5.style.borderColor = "red";
//     }
//     if (!validateImageType(input5)) {
//       errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>";
//       input5.style.borderColor = "red";
//     }
//   });

//   input6.addEventListener("change", function() {
//     errorback.innerHTML = ""; // reset the error message
//     input6.style.borderColor = "";
//     if (!validateImageSize(input6)) {
//       errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>";
//       input6.style.borderColor = "red";
//     }
//     if (!validateImageType(input6)) {
//       errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>";
//       input6.style.borderColor = "red";
//     }
//   });


// input7.addEventListener("change", function(){
//     if(input7.checked){
//         error5.innerHTML = "";
//         input7.style.borderColor = "";
//     //       // Add 2000 to the cashbond amount
//     //       var cashbondAmount = document.getElementById("cashbondAmount");
//     //       var currentAmount = parseFloat(cashbondAmount.innerHTML.replace(/,/g, ''));
//     //       var newAmount = currentAmount + 2000;
//     //       cashbondAmount.innerHTML = newAmount.toLocaleString();
//     // }
//     // else {
//     //   document.getElementById("cashbondAmount").innerHTML = "0";
//     }
// });

// radio1.addEventListener("click", function(){
//     error6.innerHTML = "";
// });
// radio2.addEventListener("click", function(){
//     error6.innerHTML = "";
// });
// radio3.addEventListener("click", function(){
//     error6.innerHTML = "";
// });
// radio4.addEventListener("click", function(){
//     error6.innerHTML = "";
// });
// radio5.addEventListener("click", function(){
//     error6.innerHTML = "";
// });

// pay1.addEventListener("click", function(){
//   errorpay.innerHTML = "";
// });
// pay2.addEventListener("click", function(){
//   errorpay.innerHTML = "";
// });
// pay3.addEventListener("click", function(){
//   errorpay.innerHTML = "";
// });


// startdate.addEventListener("change", function() {
//   errorsd.innerHTML = ""; // reset the error message
//   startdate.style.borderColor = "";
//   startdate.style.color = "";
// });

// starttime.addEventListener("change", function() {
//   errorst.innerHTML = ""; // reset the error message
//   starttime.style.borderColor = "";
//   starttime.style.color = "";
// });

// returndate.addEventListener("change", function() {
//   errorrd.innerHTML = ""; // reset the error message
//   returndate.style.borderColor = "";
//   returndate.style.color = "";
// });

// returntime.addEventListener("change", function() {
//   errorrt.innerHTML = ""; // reset the error message
//   returntime.style.borderColor = "";
//   returntime.style.color = "";
// });




//  // validate the input fields
//  if (input1.value === "") {
//     error1.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
//     input1.style.borderColor = "red";
//   }
//   if (input2.value === "") {
//     error2.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
//     input2.style.borderColor = "red";
//   }
//   if(input3.value === ""){
//     error3.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
//     input3.style.borderColor = "red";
//   }
//   if(input4.value === ""){
//     error4.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
//     input4.style.borderColor = "red";
//   }

//   if (input5.value === "") {
//     errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload front page of your license.</p>";
//     input5.style.borderColor = "red";
//   } else {
//     errorfront.innerHTML = ""; // reset the error message
//     input5.style.borderColor = "";
//     if (!validateImageSize(input5)) {
//       errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>";
//       input5.style.borderColor = "red";
//     }
//     if (!validateImageType(input5)) {
//       errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>";
//       input5.style.borderColor = "red";
//     }
//   }
  
//   if (input6.value === "") {
//     errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload back page of your license.</p>";
//     input6.style.borderColor = "red";
//   } else {
//     errorback.innerHTML = ""; // reset the error message
//     input6.style.borderColor = "";
//     if (!validateImageSize(input6)) {
//       errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >File size should be less than 1MB.</p>";
//       input6.style.borderColor = "red";
//     }
//     if (!validateImageType(input6)) {
//       errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Only image files are allowed.</p>";
//       input6.style.borderColor = "red";
//     }
//   }

//   if (!input7.checked){
//     error5.innerHTML = "<p class='err-text' >You need to accept cashbond by checking the checkbox.</p>";
//     input7.style.borderColor = "red";
//   }
//   if (!radio1.checked && !radio2.checked && !radio3.checked && !radio4.checked && !radio5.checked ) {
//     error6.innerHTML = "<p class='err-text'>You must select one option to continue.</p>";
//   }

//   if (!pay1.checked && !pay2.checked && !pay3.checked) {
//     errorpay.innerHTML = "<p class='err-text'>You must select one option to continue.</p>";
//   }


//   // validate start date & time
// if (startdate.value === "") {
//   errorsd.innerHTML = "<li class='err-text'>Start date field is required.</li>";
//   startdate.style.borderColor = "red";
//   startdate.style.color = "red";
//   document.getElementById("errorsd").style.display = "block";

// } else if (new Date(startdate.value) < new Date()) {
//   errorsd.innerHTML = "<li class='err-text' style='margin-bottom: 0px;'>Start date must be in the future.</li>";
//   startdate.style.borderColor = "red";
//   startdate.style.color = "red";
//   document.getElementById("errorsd").style.display = "block";
// } else {
//   document.getElementById("errorsd").style.display = "none";
// }

// if (starttime.value === "") {
//   errorst.innerHTML = "<li class='err-text'>Start time field is required.</li>";
//   starttime.style.borderColor = "red";
//   starttime.style.color = "red";
//   document.getElementById("errorst").style.display = "block";
// } else {
//   document.getElementById("errorst").style.display = "none";
// }

// // validate return date & time
// if (returndate.value === "") {
//   errorrd.innerHTML = "<li class='err-text'>Return date field is required.</li>";
//   returndate.style.borderColor = "red";
//   returndate.style.color = "red";
//   document.getElementById("errorrd").style.display = "block";

// } else if (new Date(returndate.value) <= new Date(startdate.value)) {
//   errorrd.innerHTML = "<li class='err-text' style='margin-bottom: 0px;'>Return date must be after start date.</li>";
//   returndate.style.borderColor = "red";
//   returndate.style.color = "red";
//   document.getElementById("errorrd").style.display = "block";
// } else {
//   document.getElementById("errorrd").style.display = "none";
// }

// if (returntime.value === "") {
//   errorrt.innerHTML = "<li class='err-text'>Return time field is required.</li>";
//   returntime.style.borderColor = "red";
//   returntime.style.color = "red";
//   document.getElementById("errorrt").style.display = "block";
// } else {
//   document.getElementById("errorrt").style.display = "none";
// }


//     // Function to validate image size
//     function validateImageSize(input) {
//       if (input.files && input.files[0]) { // check if input has files and at least one file is selected
//           const fileSize = input.files[0].size / 1024 / 1024; // get the file size in MB
//           if (fileSize > 1) { // check if file size is greater than 1MB
//               return false; // return false if file size is greater than 1MB
//           }
//       }
//       return true; // return true if file size is less than or equal to 1MB or input doesn't have files
//   }

//   // Function to validate image type
//   function validateImageType(input) {
//       if (input.files && input.files[0]) { // check if input has files and at least one file is selected
//           const allowedTypes = ["image/jpeg", "image/png", "image/gif"]; // allowed image types
//           const fileType = input.files[0].type; // get the file type
//           if (!allowedTypes.includes(fileType)) { // check if file type is not in the allowed image types
//               return false; // return false if file type is not allowed
//           }
//       }
//       return true; // return true if file type is allowed or input doesn't have files
//   }



//   const submit_btn = document.getElementById("bookingform-sumbit");
//   submit_btn.onclick = function(){
//     if (error1.innerHTML === "" && error2.innerHTML === "" && error3.innerHTML === "" && error4.innerHTML === "" && error5.innerHTML === "" && error6.innerHTML === ""&& errorsd.innerHTML === "" && errorst.innerHTML === "" && errorrd.innerHTML === "" && errorrt.innerHTML === "" && errorpay.innerHTML === ""&& errorfront.innerHTML === ""&& errorback.innerHTML === "") {
//         this.innerHTML = "<div class='loader'></div>";
//         this.disabled = true;
//         form.submit();
//         submit_btn.style.backgroundColor = "#89e5ba";
//     }
//   }
// });
