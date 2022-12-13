// DASHBOARD LOGIN

const dbTogglePassword = document.querySelector('#dbTogglePassword');
const dbPassword = document.querySelector('#dbPassword');


dbTogglePassword.addEventListener('click', function (e) {
// toggle the type attribute
const type4 = dbPassword.getAttribute('type') === 'password' ? 'text' : 'password';
dbPassword.setAttribute('type', type4);
// toggle the eye slash icon
this.classList.toggle('fa-eye-slash');
});


var password = document.getElementById('dbPassword')
var icon = document.getElementById('dbTogglePassword')


function showhideIcon() {
    
    if (password.value == "") {

        icon.style.display ='none'
        
    } else {
        icon.style.display ='flex'
        
    }
}