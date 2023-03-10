// function routeToAllVehicle() {
//     event.preventDefault();
//     const CSRF_TOKEN = $('meta[name=csrf-token]').attr('content');
    
//     $.ajax({

//         url:"/getallVehicles",
//         type:'get',
//         data:{
//             CSRF_TOKEN
//         },
//         success:function (data){
//             console.log(data)
//             // $('#dashboard-content').html(data)
//         }
//     })
    
// }


// function routeToAllVehicle() {
//     event.preventDefault();
//     const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function(){
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("dashboard-content").innerHTML =
//             this.responseText;
//         } else {
            
//         }
//     };
//     xhttp.open("GET","/getallVehicles",true);
//     xhttp.send();

// }

// function routeToAllVehicle() {
//     $.ajax({
//        type:'GET',
//        url:'/getallVehicles',
//        data:'_token = <?php echo csrf_token() ?>',
//        success:function(data) {
//             console.log(data)

//           $("#dashboard-content").html(data.dashboard-content);
//        }
//     });
//  }