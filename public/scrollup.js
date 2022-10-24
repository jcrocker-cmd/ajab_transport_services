function scrollUp(){
    const scrollUp = document.getElementById('scroll-up','scroll-up-2');
    // When the scroll is higher than 200 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 200) scrollUp.classList.add('show-scroll'); 
    else scrollUp.classList.remove('show-scroll')
}