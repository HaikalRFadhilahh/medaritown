function changeBg(){
    var navbar = document.getElementById('mynav')
    var scrollValue = window.scrollY;
    if(scrollValue > 50){
        navbar.classList.add('opacity-80');
    }if(scrollValue < 50){
        navbar.classList.remove('opacity-80');
        navbar.classList.add('bg-primary-color');
    }
}

window.addEventListener('scroll', changeBg)