// Retrieve monthly sign-in data from the controller
const labels = _labels; // Note: use the {!! !!} syntax to output the data as-is
const data = {
  labels: labels,
  datasets: [{
    label: 'Monthly Bookings',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: _data, // Note: use the {!! !!} syntax to output the data as-is
  }]
};

const config = {
  type: 'line',
  data: data,
  options: {
    animations: {
      tension: {
        duration: 1000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      y: {
        min: 0,
      }
    },
        // Set the chart width and height here
        width: 800,
        height: 400
  }
};

const myChart = new Chart(
  document.getElementById('booking_Chart'),
  config
);


//  // setup 
// const day = [
//   { x: Date.parse('2021-11-01 00:00: GMT+0800'), y: 18},
//   { x: Date.parse('2021-11-02 00:00: GMT+0800'), y: 12},
//   { x: Date.parse('2021-11-03 00:00: GMT+0800'), y: 6},
//   { x: Date.parse('2021-11-04 00:00: GMT+0800'), y: 9},
//   { x: Date.parse('2021-11-05 00:00: GMT+0800'), y: 3},
//   { x: Date.parse('2021-11-06 00:00: GMT+0800'), y: 10},
//   { x: Date.parse('2021-11-06 00:00: GMT+0800'), y: 12},
// ];

// const week = [
//   { x: Date.parse('2021-10-31 00:00: GMT+0800'), y: 50},
//   { x: Date.parse('2021-11-07 00:00: GMT+0800'), y: 20},
//   { x: Date.parse('2021-11-14 00:00: GMT+0800'), y: 33},
//   { x: Date.parse('2021-11-21 00:00: GMT+0800'), y: 43},
//   { x: Date.parse('2021-11-28 00:00: GMT+0800'), y: 40},
// ];

// const month = [
//   { x: Date.parse('2021-08-01 00:00: GMT+0800'), y: 500},
//   { x: Date.parse('2021-09-01 00:00: GMT+0800'), y: 2000},
//   { x: Date.parse('2021-10-01 00:00: GMT+0800'), y: 330},
//   { x: Date.parse('2021-11-01 00:00: GMT+0800'), y: 630},
//   { x: Date.parse('2021-12-01 00:00: GMT+0800'), y: 100},
// ];



//  const data = {
//   // labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
//   datasets: [{
//     label: 'Weekly Sales',
//     data: month,
//     backgroundColor: [
//       'rgba(255, 26, 104, 0.2)',
//       'rgba(54, 162, 235, 0.2)',
//       'rgba(255, 206, 86, 0.2)',
//       'rgba(75, 192, 192, 0.2)',
//       'rgba(153, 102, 255, 0.2)',
//       'rgba(255, 159, 64, 0.2)',
//       'rgba(0, 0, 0, 0.2)'
//     ],
//     borderColor: [
//       'rgba(255, 26, 104, 1)',
//       'rgba(54, 162, 235, 1)',
//       'rgba(255, 206, 86, 1)',
//       'rgba(75, 192, 192, 1)',
//       'rgba(153, 102, 255, 1)',
//       'rgba(255, 159, 64, 1)',
//       'rgba(0, 0, 0, 1)'
//     ],
//     borderWidth: 1
//   }]
// };

// // config 
// const config = {
//   type: 'bar',
//   data,
//   options: {
//     scales: {
//       x: {
//         type: 'time',
//         time: {
//           unit: 'month'
//         }
//       },
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// };

// // render init block
// const myChart = new Chart(
//   document.getElementById('booking_Chart'),
//   config
// );

// function timeFrame(period){
//   if (period.value == 'day') {
//     myChart.config.options.scales.x.time.unit = period.value;
//     myChart.config.data.datasets[0].data = day;
//   }
//   if (period.value == 'week') {
//     myChart.config.options.scales.x.time.unit = period.value;
//     myChart.config.data.datasets[0].data = week;
//   }
//   if (period.value == 'month') {
//     myChart.config.options.scales.x.time.unit = period.value;
//     myChart.config.data.datasets[0].data = month;
//   }
//   myChart.update();
// }

// // Instantly assign Chart.js version
// const chartVersion = document.getElementById('booking_Chart');
// chartVersion.innerText = Chart.version;