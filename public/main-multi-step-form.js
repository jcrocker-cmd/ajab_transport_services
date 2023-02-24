
// const prevBtns = document.querySelectorAll('.bf-btn-prev')
// const nextBtns = document.querySelectorAll(('.bf-btn-next'))
// const progress = document.getElementById('progress')
// const formSteps = document.querySelectorAll('.booking-form')
// const progressSteps = document.querySelectorAll('.progress-step')

// let formStepsNum = 0;

// nextBtns.forEach(btn => {
//     btn.addEventListener('click',() => {
//         formStepsNum++;
//         updateFormSteps();
//         updateProgressBar();
//     })
// })
  

// prevBtns.forEach(btn => {
//     btn.addEventListener('click',() => {
//         formStepsNum--;
//         updateFormSteps();
//         updateProgressBar();

//     })
// })

// function updateFormSteps(){
//     formSteps.forEach(formStep => {
//         formStep.classList.contains('active')&&
//             formStep.classList.remove('active')
//     })
//     formSteps[formStepsNum].classList.add('active')
// }

// function updateProgressBar(){
//     progressSteps.forEach((progressStep, idx) => {
//         if (idx < formStepsNum + 1){
//             progressStep.classList.add('active')
//         }
//         else{
//             progressStep.classList.remove('active')
//         }

//     })

//     const progressActive  = document.querySelectorAll('.progress-step.active')

//     progress.style.width = (progressActive.length -1) / (progressSteps.length -1) * 100 + '%'

// }




// const prevBtns = document.querySelectorAll('.bf-btn-prev')
// const nextBtns = document.querySelectorAll(('.bf-btn-next'))
// const progress = document.getElementById('progress')
// const formSteps = document.querySelectorAll('.booking-form')
// const progressSteps = document.querySelectorAll('.progress-step')

// let formStepsNum = 0;

// nextBtns.forEach(btn => {
//     btn.addEventListener('click',() => {
//         if (hasErrors()) {
//             return; // Prevent the form from proceeding
//         }
//         formStepsNum++;
//         updateFormSteps();
//         updateProgressBar();
//     })
// })
  

// prevBtns.forEach(btn => {
//     btn.addEventListener('click',() => {
//         formStepsNum--;
//         updateFormSteps();
//         updateProgressBar();

//     })
// })

// function updateFormSteps(){
//     formSteps.forEach(formStep => {
//         formStep.classList.contains('active')&&
//             formStep.classList.remove('active')
//     })
//     formSteps[formStepsNum].classList.add('active')
// }

// function updateProgressBar(){
//     progressSteps.forEach((progressStep, idx) => {
//         if (idx < formStepsNum + 1){
//             progressStep.classList.add('active')
//         }
//         else{
//             progressStep.classList.remove('active')
//         }

//     })

//     const progressActive  = document.querySelectorAll('.progress-step.active')

//     progress.style.width = (progressActive.length -1) / (progressSteps.length -1) * 100 + '%'

// }


// // Get the form element
// var form = document.getElementById("bookingForm");

// // Get the input elements
// var input1 = document.getElementById("name");


// // Get the error message elements
// var error1 = document.getElementById("errorname");


// // Add a submit event listener to the form
// form.addEventListener("submit", function(event) {
//   event.preventDefault(); // prevent the form from submitting

//   // Reset the error messages
//   input1.addEventListener("keyup", function() {
//     error1.innerHTML = ""; // reset the error message
//     input1.style.borderColor = "";
// });



//  // validate the input fields
//  if (input1.value === "") {
//     error1.innerHTML = "<p class='err-text'  style='margin-bottom: 0px; margin-top: 5px;' >This field is required.</p>";
//     input1.style.borderColor = "red";
//   }

//   const submit_btn = document.querySelector(".bookingform-sumbit");
//   submit_btn.onclick = function(){
//     if (error1.innerHTML === "") {
//         this.innerHTML = "<div class='loader'></div>";
//         this.disabled = true;
//         form.submit();
//         submit_btn.style.backgroundColor = "#89e5ba";
//         // submit_btn.style.backgroundColor = "rgb(137, 229, 186)";

//     }
//   }
// });

// function hasErrors() {
//   let errors = false;

//   // Check for errors in each input field and display them if necessary
//   if (input1.value === '') {
//     error1.innerHTML = 'This field is required.';
//     input1.style.borderColor = 'red';
//     errors = true;
//   } else {
//     error1.innerHTML = '';
//     input1.style.borderColor = '';
//   }

//   // Repeat for other input fields...

//   // Return the value of errors (true if there are errors, false if there are not)
//   return errors;
// }




