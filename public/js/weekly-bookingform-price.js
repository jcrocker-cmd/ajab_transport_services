// get the start date and total weeks inputs
const startDateInput = document.getElementById("startdate");
const totalWeeksInput = document.getElementById("total_weeks_input");

// listen for changes to the date input and total weeks input
startDateInput.addEventListener("change", updateTotalWeeks);
totalWeeksInput.addEventListener("change", updateTotalWeeks);

function updateTotalWeeks() {
  const startDate = new Date(startDateInput.value);
  const totalWeeks = parseInt(totalWeeksInput.value);

  // calculate the return date based on the start date and total weeks
  const returnDate = new Date(startDate.getTime() + (totalWeeks * 7 * 24 * 60 * 60 * 1000));

  // update the value of the Return Date input
  const returnDateInput = document.getElementById("returndate");
  returnDateInput.value = returnDate.toISOString().split("T")[0];

  // update the text content of the <p> element for the total weeks
  const totalWeeksParagraph = document.getElementById("total_weeks");
  totalWeeksParagraph.textContent = `${totalWeeks} Week/s`;

  // calculate the total rate
  const weeklyRateInput = document.getElementById("car_price");
  const weeklyRate = parseFloat(weeklyRateInput.value);
  const totalRate = weeklyRate * totalWeeks;

  // update the text content of the <p> element for the total rate
  const totalRateParagraph = document.getElementById("total_rates");
  totalRateParagraph.textContent = `${totalRate.toLocaleString()}`;

  // set the value of the Total Rates input
  const totalRatesInput = document.getElementById("total_weeks_input");
  totalRatesInput.value = totalRate;
}
