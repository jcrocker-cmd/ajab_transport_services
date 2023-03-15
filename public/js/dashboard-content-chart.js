
// const labels =  @json($months);

//   const data = {
//     labels: labels,
//     datasets: [{
//       label: 'Monthly Income',
//       backgroundColor: 'rgb(255, 99, 132)',
//       borderColor: 'rgb(255, 99, 132)',
//       data: [5, 10, 5, 2, 20, 30],
//     }]
//   };

//   const config = {
//     type: 'bar',
//     data: data,
//     options: {
//       animations: {
//         tension: {
//           duration: 1000,
//           easing: 'linear',
//           from: 1,
//           to: 0,
//           loop: true
          
//         }
//       },
//       scales: {
//         y: { // defining min and max so hiding the dataset does not change scale range
//           min: 0,
          
//         }
//       }
//     }
//   };

//   const myChart = new Chart(
//     document.getElementById('dashboard-Chart'),
//     config
//   );


// Retrieve monthly sign-in data from the controller
const labels = _labels; // Note: use the {!! !!} syntax to output the data as-is
const data = {
  labels: labels,
  datasets: [{
    label: 'Monthly Sign-ins',
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
    }
  }
};

const myChart = new Chart(
  document.getElementById('dashboard-Chart'),
  config
);
