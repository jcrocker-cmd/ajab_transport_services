
// Get the form element
var form = document.getElementById("homeRequest");

// Get the input elements
var input1 = document.getElementById("name");
var input2 = document.getElementById("phone");
var input3 = document.getElementById("email");
var input4 = document.getElementById("subject");
var input5 = document.getElementById("msg");

// Get the error message elements
var error1 = document.getElementById("error-name");
var error2 = document.getElementById("error-phone");
var error3 = document.getElementById("error-email");
var error4 = document.getElementById("error-subject");
var error5 = document.getElementById("error-msg");



// Add a submit event listener to the form
form.addEventListener("submit", function(event) {
  event.preventDefault(); // prevent the form from submitting

  // Reset the error messages
  input1.addEventListener("keyup", function() {
    error1.innerHTML = ""; // reset the error message
    input1.style.borderColor = "";
});

input2.addEventListener("keyup", function() {
    error2.innerHTML = ""; // reset the error message
    input2.style.borderColor = "";
});

input3.addEventListener("keyup", function() {
    error3.innerHTML = ""; // reset the error message
    input3.style.borderColor = "";
});
input4.addEventListener("keyup", function() {
    error4.innerHTML = ""; // reset the error message
    input4.style.borderColor = "";
});
input5.addEventListener("keyup", function() {
    error5.innerHTML = ""; // reset the error message
    input5.style.borderColor = "";
});

 // validate the input fields
 if (input1.value === "") {
    error1.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
    input1.style.borderColor = "red";
  }
  if (input2.value === "") {
    error2.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
    input2.style.borderColor = "red";
  }
  if(input3.value === ""){
    error3.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
    input3.style.borderColor = "red";
  }
  if(input4.value === ""){
    error4.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
    input4.style.borderColor = "red";
  }
  if (input5.value === ""){
    error5.innerHTML = "<p class='err-text' style='margin-bottom: 0px;' >You need to leave a message.</p>";
    input5.style.borderColor = "red";
  }

  const submit_btn = document.getElementById("sendRequest-submit");
  submit_btn.onclick = function(){
    if (error1.innerHTML === "" && error2.innerHTML === "" && error3.innerHTML === "" && error4.innerHTML === "" && error5.innerHTML === "") {
        this.innerHTML = "<div class='loader'></div>";
        this.disabled = true;
        form.submit();
        submit_btn.style.backgroundColor = "#89e5ba";
        // submit_btn.style.backgroundColor = "rgb(137, 229, 186)";

    }
}
});

