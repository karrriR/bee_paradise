let offest = 0; 
const sliderLine = document.querySelector('.section-slider_slider-line');

function slideNext() {
    offest = offest +=1920;
    if(offest > 3840){
        offest = 0;
    }
    sliderLine.style.left = -offest + 'px';
    
}
function slidePrew() { 
    offest = offest -=1920; 
    if(offest < 0){
        offest = 3840; 
    }
    sliderLine.style.left = -offest + 'px'; 
}
