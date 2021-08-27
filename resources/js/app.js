const { range } = require('lodash');

require('./bootstrap');

require('alpinejs');

const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', (e) => {
    const { scrollTop } = document.documentElement;
    console.log(scrollTop)
    if (scrollTop > 300) {
        navbar.setAttribute('style', 'position : fixed; top : 0px; background-color: black;');
    }
    if (scrollTop < 300) {
        navbar.setAttribute('style', 'position : relative;  background-color: transparent;');
    } else {

    }
})

/* const { body } = document
window.addEventListener('mousemove', onMouseMove);

function onMouseMove(e) {
    const movement = (e.clientX - window.innerWidth / 2) / window.innerWidth * 2;
    console.log(movement);
    body.style.transform = `translate3d(calc(${-movement} * 2vh), 0, 0)`;

} */
console.log('child');

const toggleButton = document.querySelector('.toggle-button')
console.log(toggleButton);
toggleButton.addEventListener('click', () => {
    toggleButton.classList.toggle('button-open')
})