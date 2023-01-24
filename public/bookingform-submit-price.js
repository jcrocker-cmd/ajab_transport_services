// // Get the elements
// const cashbondCheck = document.getElementById('cashbond');
// const cashbondAmount = document.getElementById('cashbondAmount');
// const deliveryFee = document.getElementById('deliveryFee');
// const totalAmount = document.querySelector('h5 strong');
// const deliveryOptions = document.getElementsByName('mode_del');

// // Add event listener to cashbond checkbox
// cashbondCheck.addEventListener('change', (event) => {
//   if (event.target.checked) {
//     cashbondAmount.textContent = '2,000';
//   } else {
//     cashbondAmount.textContent = '0';
//   }
//   calculateTotal();
// });

// // Add event listener to delivery options
// for (let i = 0; i < deliveryOptions.length; i++) {
//   deliveryOptions[i].addEventListener('change', (event) => {
//     deliveryFee.textContent = event.target.value;
//     calculateTotal();
//   });
// }

// // Function to calculate the total amount payable
// function calculateTotal() {
//   let cashbond = parseInt(cashbondAmount.textContent);
//   let fee = parseInt(deliveryFee.textContent);
//   let total = cashbond + fee;
//   totalAmount.textContent = `₱ ${total}`;
// }

// select the checkbox and radio buttons
const cashbondCheckbox = document.querySelector("#cashbond");
const modeOfDeliveryRadios = document.querySelectorAll(".d-flex.mode-of-delivery input[type='radio']");

// select the span elements that display the amounts
const cashbondAmountSpan = document.querySelector("#cashbondAmount");
const deliveryFeeSpan = document.querySelector("#deliveryFee");
const totalAmountPayableSpan = document.querySelector("#totalAmountPayable");

// attach event listeners to the checkbox and radio buttons
cashbondCheckbox.addEventListener("change", updateAmounts);
modeOfDeliveryRadios.forEach(radio => radio.addEventListener("change", updateAmounts));

function updateAmounts() {
  let cashbondAmount = 0;
  let deliveryFee = 0;
  
  // update the cashbond amount
  if (cashbondCheckbox.checked) {
    cashbondAmount = parseInt(cashbondCheckbox.value);
    cashbondAmount = cashbondAmount.toLocaleString();
  }
  
  // update the delivery fee
  for (let i = 0; i < modeOfDeliveryRadios.length; i++) {
    if (modeOfDeliveryRadios[i].checked) {
      deliveryFee = parseInt(modeOfDeliveryRadios[i].value);
      break;
    }
  }
  
  // update the amount spans
  cashbondAmountSpan.innerHTML = cashbondAmount;
  deliveryFeeSpan.innerHTML = deliveryFee.toLocaleString();
  totalAmountPayableSpan.innerHTML = (parseInt(cashbondAmount.replace(/,/g,'')) + deliveryFee).toLocaleString();
}