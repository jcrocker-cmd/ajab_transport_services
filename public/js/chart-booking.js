
// const chartTypes = {
//   line: 'line',
//   bar: 'bar',
// };

const data = {
  labels: day_labels,
  datasets: [{
    label: 'Daily Bookings',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: day_data, // Note: use the {!! !!} syntax to output the data as-is
  }]
};

const config_line = {
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
        beginAtZero: true
      }
    },
    title: {
      display: true,
      text: 'Monthly Bookings'
    },
    // Set the chart width and height here
    width: 800,
    height: 400
  }
};


const config_bar = {
  type: 'bar',
  data: data,
  options: {
    indexAxis: 'y',
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
        beginAtZero: true
      }
    },
    title: {
      display: true,
      text: 'Monthly Bookings'
    },
  }
};


let myChart = new Chart(
  document.getElementById('booking_Chart'),
  config_bar
);

document.getElementById('display-selector').addEventListener('change', function() {
  var displayType = this.value;
  var labels, data, title, datasetLabel;
  
  if (displayType === 'day') {
    labels = day_labels;
    data = day_data;
    title = 'Daily Bookings';
    datasetLabel = 'Daily Bookings';
  } else if (displayType === 'week') {
    labels = week_labels;
    data = week_data;
    title = 'Weekly Bookings';
    datasetLabel = 'Weekly Bookings';
  } else if (displayType === 'month') {
    labels = month_labels;
    data = month_data;
    title = 'Monthly Bookings';
    datasetLabel = 'Monthly Bookings';
  } else if (displayType === 'year') {
    labels = year_labels;
    data = year_data;
    title = 'Yearly Bookings';
    datasetLabel = 'Yearly Bookings';
  }
  
  myChart.data.labels = labels;
  myChart.data.datasets[0].label = datasetLabel;
  myChart.data.datasets[0].data = data;
  myChart.options.title.text = title;

  myChart.update();
});

function chartType(type){
  myChart.destroy();
  if (type === 'bar') {
      myChart = new Chart(
      document.getElementById('booking_Chart'),
      config_bar
    );
  }

  if (type === 'line') {
    myChart = new Chart(
    document.getElementById('booking_Chart'),
    config_line
  );
}
}


//     // setup 
//     const data = {
//       labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',],
//       datasets: [{
//         label: 'Weekly Sales',
//         data: [18, 12, 6, 9, 12, 3, 9, 18, 12, 6, 9, 12, 3, 9, 3, 9, 18, 12, 6, 9],
//         backgroundColor: [
//           'rgba(255, 26, 104, 0.2)',
//           'rgba(54, 162, 235, 0.2)',
//           'rgba(255, 206, 86, 0.2)',
//           'rgba(75, 192, 192, 0.2)',
//           'rgba(153, 102, 255, 0.2)',
//           'rgba(255, 159, 64, 0.2)',
//           'rgba(0, 0, 0, 0.2)'
//         ],
//         borderColor: [
//           'rgba(255, 26, 104, 1)',
//           'rgba(54, 162, 235, 1)',
//           'rgba(255, 206, 86, 1)',
//           'rgba(75, 192, 192, 1)',
//           'rgba(153, 102, 255, 1)',
//           'rgba(255, 159, 64, 1)',
//           'rgba(0, 0, 0, 1)'
//         ],
//         borderWidth: 1
//       }]
//     };

//     // config 
//     const config = {
//       type: 'bar',
//       data,
//       options: {
//         scales: {
//           y: {
//             beginAtZero: true
//           }
//         }
//       }
//     };

//     const config2 = {
//       type: 'line',
//       data,
//       options: {
//         scales: {
//           y: {
//             beginAtZero: true
//           }
//         }
//       }
//     };

//         // render init block
//         let myChart = new Chart(
//           document.getElementById('booking_Chart'),
//           config
//         );

//   function chartType(type){
//     myChart.destroy();
//     if (type === 'bar') {
//         myChart = new Chart(
//         document.getElementById('booking_Chart'),
//         config
//       );
//     }

//     if (type === 'line') {
//       myChart = new Chart(
//       document.getElementById('booking_Chart'),
//       config2
//     );
//   }
// }

  