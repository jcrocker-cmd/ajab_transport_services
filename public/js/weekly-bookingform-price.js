

// Initialize previous delivery mode price to 0
let previousOptionValue = 0;

// Get the radio buttons
const deliveryOptions = document.querySelectorAll('input[name="mode_del"]');

// Add event listener to each radio button
deliveryOptions.forEach(option => {
  option.addEventListener('click', () => {
    // Get the value of the selected delivery option
    const selectedOptionValue = option.getAttribute('data-delivery-price');

    // Calculate the new total price by subtracting the previous delivery mode price and adding the new one
    const totalPriceElement = document.getElementById('delivery_fee_value');
    const currentPrice = parseFloat(totalPriceElement.innerText);
    const newPrice = currentPrice - previousOptionValue + parseFloat(selectedOptionValue);
    totalPriceElement.innerText = newPrice.toFixed(2);

    // Update the input field value as well
    const deliveryFeeInputElement = document.getElementById('delivery_fee_value_input');
    deliveryFeeInputElement.value = newPrice;

    // Update the previous delivery mode price to the current one
    previousOptionValue = parseFloat(selectedOptionValue);
  });
});




// Initialize previous cashbond value to 0
let previousCashbondValue = 0;

// Get the cashbond checkbox
const cashbondCheckbox = document.getElementById('cashbond');

// Add event listener to the cashbond checkbox
cashbondCheckbox.addEventListener('click', () => {
  if (cashbondCheckbox.checked) {
    // Get the cashbond value
    const cashbondValue = parseInt(cashbondCheckbox.value);

    // Update the cashbond amount in the <p>
    const cashbondAmountElement = document.getElementById('cashbondAmount');
    const currentCashbondAmount = parseFloat(cashbondAmountElement.innerText);
    const newCashbondAmount = currentCashbondAmount + cashbondValue;
    cashbondAmountElement.innerText = newCashbondAmount.toFixed(2);

    // Update the cashbond input value as well
    const cashbondInputElement = document.getElementById('cashbondAmount_input');
    const currentCashbondInput = parseFloat(cashbondInputElement.value);
    const newCashbondInput = currentCashbondInput + cashbondValue;
    cashbondInputElement.value = newCashbondInput;

    // Update the previous cashbond value to the current one
    previousCashbondValue = cashbondValue;
  } else {
    // If the cashbond checkbox is unchecked, subtract its value from the cashbond amount in the <p> and input field
    const cashbondAmountElement = document.getElementById('cashbondAmount');
    const currentCashbondAmount = parseFloat(cashbondAmountElement.innerText);
    const newCashbondAmount = currentCashbondAmount - previousCashbondValue;
    cashbondAmountElement.innerText = newCashbondAmount;

    const cashbondInputElement = document.getElementById('cashbondAmount_input');
    const currentCashbondInput = parseFloat(cashbondInputElement.value);
    const newCashbondInput = currentCashbondInput - previousCashbondValue;
    cashbondInputElement.value = newCashbondInput;

    // Update the previous cashbond value to 0 since it's now unchecked
    previousCashbondValue = 0;
  }
});






// Get the start date input element
const startDateInput = document.getElementById('startdate');

// Get the total weeks input element
const totalWeeksInput = document.getElementById('total_weeks_select');

// Get the return date input element
const returnDateInput = document.getElementById('returndate');

// Get the car price and total weeks input elements
const carPriceInput = document.getElementById('car_price');
const _totalWeeksInput = document.getElementById('total_weeks_select');

// Get the total rates input and paragraph elements
const total_RatesInput = document.getElementById('total_rates_input');
const totalRatesParagraph = document.getElementById('total_rates');

// Add event listeners to the start date and total weeks input elements to update the return date and total rates
startDateInput.addEventListener('change', updateReturnDateAndTotalRates);
totalWeeksInput.addEventListener('change', updateReturnDateAndTotalRates);
_totalWeeksInput.addEventListener('change', updateReturnDateAndTotalRates);
carPriceInput.addEventListener('change', updateReturnDateAndTotalRates);

function updateReturnDateAndTotalRates() {
  // Get the selected start date
  const startDate = new Date(startDateInput.value);

  // Get the number of weeks and car price
  const totalWeeks = parseFloat(_totalWeeksInput.value);
  const carPrice = parseFloat(carPriceInput.value);

  // Calculate the return date and total rates
  if (startDate && !isNaN(totalWeeks) && !isNaN(carPrice)) {
    const returnDate = new Date(startDate.getTime() + totalWeeks * 7 * 24 * 60 * 60 * 1000);
    const returnDateString = returnDate.toISOString().split('T')[0];
    const totalRates = totalWeeks * carPrice;
    
    // Update the return date, total rates input, and paragraph elements
    returnDateInput.value = returnDateString;
    total_RatesInput.value = totalRates;
    totalRatesParagraph.innerText = `${totalRates.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;
  }
}





const cashRadio = document.getElementById("pay1");
const gCashRadio = document.getElementById("pay2");
const cardRadio = document.getElementById("pay3");
const vatParagraph = document.getElementById("vat");
const vatInput = document.getElementById("vat_input");
const totalRatesInput = document.getElementById("total_rates_input");
const start_dateInput = document.getElementById("startdate");
const return_dateInput = document.getElementById("returndate");

function calculateVat() {
  const totalRate = parseFloat(totalRatesInput.value);
  let vat = 0;
  if (cardRadio.checked) {
    vat = totalRate * 0.0275;
  }
  vatParagraph.textContent = `${vat.toLocaleString()}`;
  vatInput.value = vat;
}


cashRadio.addEventListener("change", () => {
  if (cashRadio.checked) {
    vatParagraph.textContent = `0`;
    vatInput.value = "0";
  }
});

gCashRadio.addEventListener("change", () => {
  if (gCashRadio.checked) {
    vatParagraph.textContent = `0`;
    vatInput.value = "0";
  }
});

cardRadio.addEventListener("change", () => {
  if (cardRadio.checked) {
    calculateVat();
  }
});

totalRatesInput.addEventListener("input", () => {
  calculateVat();
});

start_dateInput.addEventListener("change", () => {
  calculateVat();
});

return_dateInput.addEventListener("change", () => {
  calculateVat();
});

totalWeeksInput.addEventListener("change", () => {
  calculateVat();
});



const _cashRadio = document.getElementById("pay1");
const _gCashRadio = document.getElementById("pay2");
const _cardRadio = document.getElementById("pay3");
const _opt1 = document.getElementById("opt1");
const _opt2 = document.getElementById("opt2");
const _opt3 = document.getElementById("opt3");
const _opt4 = document.getElementById("opt4");
const _opt5 = document.getElementById("opt5");
const _cashbond = document.getElementById("cashbond");
const _vatInput = document.getElementById("vat_input");
const _totalRatesInput = document.getElementById("total_rates_input");
const _cashBondInput = document.getElementById("cashbondAmount_input");
const _deliveryFeeInput = document.getElementById("delivery_fee_value_input");
const _totalAmountPayableInput = document.getElementById("total_amount_payable_input");
const _totalAmountPayableText = document.getElementById("totalAmountPayable");
const _start_dateInput = document.getElementById("startdate");
const _return_dateInput = document.getElementById("returndate");

function updateTotalAmountPayable() {
  const totalRate = parseFloat(_totalRatesInput.value);
  const cashBond = parseFloat(_cashBondInput.value);
  const deliveryFee = parseFloat(_deliveryFeeInput.value);
  const vat = _cardRadio.checked ? totalRate * 0.0275 : 0;
  const totalAmountPayable = totalRate + cashBond + deliveryFee + vat;
  _totalAmountPayableInput.value = totalAmountPayable.toFixed(2);
  _totalAmountPayableText.textContent = totalAmountPayable.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

_cashRadio.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_gCashRadio.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_cardRadio.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_opt1.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_opt2.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_opt3.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_opt4.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_opt5.addEventListener("change", () => {
  updateTotalAmountPayable();
});



_totalRatesInput.addEventListener("input", () => {
  updateTotalAmountPayable();
});

_cashBondInput.addEventListener("input", () => {
  updateTotalAmountPayable();
});

_deliveryFeeInput.addEventListener("input", () => {
  updateTotalAmountPayable();
});

_start_dateInput.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_return_dateInput.addEventListener("change", () => {
  updateTotalAmountPayable();
});

_cashbond.addEventListener("change", () => {
  updateTotalAmountPayable();
});


_totalWeeksInput.addEventListener("change", () => {
  updateTotalAmountPayable();
});