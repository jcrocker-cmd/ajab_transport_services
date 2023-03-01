
// Get the form element
var form = document.getElementById("bookingForm");

// Get the input elements
var input1 = document.getElementById("name");
var input2 = document.getElementById("number");
var input3 = document.getElementById("address");
var input4 = document.getElementById("email");

var input5  = document.getElementById("front-license")
var input6  = document.getElementById("back-license")

var input7 = document.getElementById("cashbond");

var radio1 = document.getElementById("opt1");
var radio2 = document.getElementById("opt2");
var radio3 = document.getElementById("opt3");
var radio4 = document.getElementById("opt4");
var radio5 = document.getElementById("opt5");

var pay1 = document.getElementById("pay1");
var pay2 = document.getElementById("pay2");
var pay3 = document.getElementById("pay3");

var startdate = document.getElementById("startdate");
var starttime = document.getElementById("starttime");
var returndate = document.getElementById("returndate");
var returntime = document.getElementById("returntime");

var accept = document.getElementById("accept");


// Get the error message elements
var error1 = document.getElementById("errorname");
var error2 = document.getElementById("errornum");
var error3 = document.getElementById("erroradd");
var error4 = document.getElementById("erroremail");

var errorfront = document.getElementById("errorfront");
var errorback = document.getElementById("errorback");

var error5 = document.getElementById("errorcash");
var error6 = document.getElementById("errorradio");
var errorpay = document.getElementById("errorpay");

var errorsd = document.getElementById("errorsd");
var errorst = document.getElementById("errorst");
var errorrd = document.getElementById("errorrd");
var errorrt = document.getElementById("errorrt");


document.getElementById("errorsd").style.display = "none";
document.getElementById("errorst").style.display = "none";
document.getElementById("errorrd").style.display = "none";
document.getElementById("errorrt").style.display = "none";

var erroragree = document.getElementById("erroragree");

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

input5.addEventListener("change", function() {
  errorfront.innerHTML = ""; // reset the error message
  input5.style.borderColor = "";
});

input6.addEventListener("change", function() {
  errorback.innerHTML = ""; // reset the error message
  input6.style.borderColor = "";
});


input7.addEventListener("change", function(){
    if(input7.checked){
        error5.innerHTML = "";
        input7.style.borderColor = "";
    //       // Add 2000 to the cashbond amount
    //       var cashbondAmount = document.getElementById("cashbondAmount");
    //       var currentAmount = parseFloat(cashbondAmount.innerHTML.replace(/,/g, ''));
    //       var newAmount = currentAmount + 2000;
    //       cashbondAmount.innerHTML = newAmount.toLocaleString();
    // }
    // else {
    //   document.getElementById("cashbondAmount").innerHTML = "0";
    }
});

radio1.addEventListener("click", function(){
    error6.innerHTML = "";
});
radio2.addEventListener("click", function(){
    error6.innerHTML = "";
});
radio3.addEventListener("click", function(){
    error6.innerHTML = "";
});
radio4.addEventListener("click", function(){
    error6.innerHTML = "";
});
radio5.addEventListener("click", function(){
    error6.innerHTML = "";
});

pay1.addEventListener("click", function(){
  errorpay.innerHTML = "";
});
pay2.addEventListener("click", function(){
  errorpay.innerHTML = "";
});
pay3.addEventListener("click", function(){
  errorpay.innerHTML = "";
});


startdate.addEventListener("change", function() {
  errorsd.innerHTML = ""; // reset the error message
  startdate.style.borderColor = "";
  startdate.style.color = "";
});

starttime.addEventListener("change", function() {
  errorst.innerHTML = ""; // reset the error message
  starttime.style.borderColor = "";
  starttime.style.color = "";
});

returndate.addEventListener("change", function() {
  errorrd.innerHTML = ""; // reset the error message
  returndate.style.borderColor = "";
  returndate.style.color = "";
});

returntime.addEventListener("change", function() {
  errorrt.innerHTML = ""; // reset the error message
  returntime.style.borderColor = "";
  returntime.style.color = "";
});


accept.addEventListener("change", function(){
  if(accept.checked){
      erroragree.innerHTML = "";
      accept.style.borderColor = "";
  }
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

  if(input5.value === ""){
    errorfront.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload front page of your license.</p>";
    input5.style.borderColor = "red";
  }

  if(input6.value === ""){
    errorback.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >Upload front page of your license.</p>";
    input6.style.borderColor = "red";
  }

  if (!input7.checked){
    error5.innerHTML = "<p class='err-text' >You need to accept cashbond by checking the checkbox.</p>";
    input7.style.borderColor = "red";
  }
  if (!radio1.checked && !radio2.checked && !radio3.checked && !radio4.checked && !radio5.checked ) {
    error6.innerHTML = "<p class='err-text'>You must select one option to continue.</p>";
  }

  if (!pay1.checked && !pay2.checked && !pay3.checked) {
    errorpay.innerHTML = "<p class='err-text'>You must select one option to continue.</p>";
  }


  // validate start date & time
if (startdate.value === "") {
  errorsd.innerHTML = "<li class='err-text'>Start date field is required.</li>";
  startdate.style.borderColor = "red";
  startdate.style.color = "red";
  document.getElementById("errorsd").style.display = "block";

} else if (new Date(startdate.value) < new Date()) {
  errorsd.innerHTML = "<li class='err-text' style='margin-bottom: 0px;'>Start date must be in the future.</li>";
  startdate.style.borderColor = "red";
  startdate.style.color = "red";
  document.getElementById("errorsd").style.display = "block";
} else {
  document.getElementById("errorsd").style.display = "none";
}

if (starttime.value === "") {
  errorst.innerHTML = "<li class='err-text'>Start time field is required.</li>";
  starttime.style.borderColor = "red";
  starttime.style.color = "red";
  document.getElementById("errorst").style.display = "block";
} else {
  document.getElementById("errorst").style.display = "none";
}

// validate return date & time
if (returndate.value === "") {
  errorrd.innerHTML = "<li class='err-text'>Return date field is required.</li>";
  returndate.style.borderColor = "red";
  returndate.style.color = "red";
  document.getElementById("errorrd").style.display = "block";

} else if (new Date(returndate.value) <= new Date(startdate.value)) {
  errorrd.innerHTML = "<li class='err-text' style='margin-bottom: 0px;'>Return date must be after start date.</li>";
  returndate.style.borderColor = "red";
  returndate.style.color = "red";
  document.getElementById("errorrd").style.display = "block";
} else {
  document.getElementById("errorrd").style.display = "none";
}

if (returntime.value === "") {
  errorrt.innerHTML = "<li class='err-text'>Return time field is required.</li>";
  returntime.style.borderColor = "red";
  returntime.style.color = "red";
  document.getElementById("errorrt").style.display = "block";
} else {
  document.getElementById("errorrt").style.display = "none";
}

  if (!accept.checked){
    erroragree.innerHTML = "<p class='err-text' >You need to agree our terms privacy and policy.</p>";
    accept.style.borderColor = "red";
  }
  // if (error1.innerHTML === "" && error2.innerHTML === "" && error3.innerHTML === "" && error4.innerHTML === "" && error5.innerHTML === "" && error6.innerHTML === "") {
  //   // No errors, submit the form
  //   form.submit();
  // }

  const submit_btn = document.querySelector(".bookingform-sumbit");
  submit_btn.onclick = function(){
    if (error1.innerHTML === "" && error2.innerHTML === "" && error3.innerHTML === "" && error4.innerHTML === "" && error5.innerHTML === "" && error6.innerHTML === ""&& errorsd.innerHTML === "" && errorst.innerHTML === "" && errorrd.innerHTML === "" && errorrt.innerHTML === "" && erroragree.innerHTML === "" && errorpay.innerHTML === ""&& errorfront.innerHTML === ""&& errorback.innerHTML === "") {
        this.innerHTML = "<div class='loader'></div>";
        this.disabled = true;
        form.submit();
        submit_btn.style.backgroundColor = "#89e5ba";
    }
  }
});