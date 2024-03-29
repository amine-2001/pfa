const header = document.querySelector('header');

function fixedNavbar() {
    header.classList.toggle('scroll', window.scrollY > 0);
}

fixedNavbar();

window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn'); // "Let" doit être en minuscules, corrigé à "let"
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function() {
    let nav = document.querySelector('.navbar'); // "Let" doit être en minuscules, corrigé à "let"
    nav.classList.toggle('active');
});

userBtn.addEventListener('click', function() {
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
    
    // Ajoutez cette ligne pour ajouter ou supprimer la classe au corps du document
    document.body.classList.toggle('user-box-active', userBox.classList.contains('active'));
});


/*--------home page slider------*/

"use strict"

const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'); 
const rightArrow = document.querySelector('.right-arrow .bxs-right-arrow');
const slider = document.querySelector('.slider');

/* -----scroll to right-------*/

function scrollRight(){

if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {

slider.scrollTo({

left: 0,

behavior: "smooth"

}); }else{

slider.scrollBy({

left: window.innerWidth, behavior: "smooth"

})

}

}

/* -----scroll to left---*/

function scrollLeft(){

slider.scrollBy({

left: -window.innerWidth, behavior: "smooth"

})

}
let timerId = setInterval(scrollRight, 7000);

/*--------reset timer to scroll right*/

function resetTimer(){

clearInterval(timerId);

timerId = setInterval(scrollRight, 7000);

}

/*--------scroll event---*/

slider.addEventListener('click', function(ev){

if(ev.target === leftArrow) {

scrollLeft();

resetTimer();

}

})

slider.addEventListener('click', function(ev){

if(ev.target === rightArrow) {

scrollRight();

resetTimer();

} })
/*-----------testimonial slider------*/

let slides= document.querySelectorAll('.testimonial-item');

let index = 0;

function nextSlide(){

slides[index].classList.remove('active'); index (index + 1) % slides.length;

slides[index].classList.add('active');

}

function prevSlide(){

slides[index].classList.remove('active'); index (index + slides.length)% slides.length;

slides[index].classList.add('active');

}



