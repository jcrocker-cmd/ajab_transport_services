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