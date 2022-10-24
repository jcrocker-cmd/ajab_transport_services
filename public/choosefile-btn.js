// CHANGE CHOOSE FILE BUTTON

const defaultBtn = document.querySelector("#default-btn")
const fileName = document.querySelector(".settings-title")
const customBtn = document.querySelector("#custom-btn")
const img = document.querySelector("img")

function defaultBtnActive() {
    defaultBtn.click();
}


// PREVIEW IMAGE 

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#change-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }

}

$("#default-btn").change(function(){
    readURL(this);
});



// $(document).ready(function() {
//     $('#vehicle-info1') || ('#vehicle').on('input change', function() {
//         if($(this).val() != '') {
//             $('#addcar-btn-next').prop('disabled', false);
//         } else {
//             $('#addcar-btn-next').prop('disabled', true);
//         }
//     });
// });

// $(document).ready(function() {
//     $('#addcar-btn-next').prop('disabled', true);
  
//     function validateNextButton() {
//       var buttonDisabled = $('#vehicle').val().trim() === '' || $('vehicle-inf').val().trim() === '';
//       $('#addcar-btn-next').prop('disabled', buttonDisabled);
//     }
  
//     $('#vehicle').on('keyup', validateNextButton);
//     $('#vehicle-inf').on('keyup', validateNextButton);
//   });





// $(document).ready(function() {
//     $('#addcar-btn-next').prop('disabled', true);

//     $('#vehicle, #vehicle-inf').on('input', function() {
//           var val = $('#vehicle, #vehicle-inf').filter(function() {
//                 return this.value.trim().length === 0;
//         }).length === 0;

//         $('#addcar-btn-next').prop('disabled', val);
//     });
// })
