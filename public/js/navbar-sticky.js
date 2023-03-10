window.onscroll = () => {
    var nav  = document.querySelector('nav');
    
    if (window.pageYOffset > 0) {
        nav.classList.add("sticky")
    } 
    else {
        nav.classList.remove("sticky");
    }
}