/**
 * ES6 Module: Scroll
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


export function addScrollEventListener() {
    document.addEventListener('scroll', () => changeNavColor(), { passive: true });
}


function changeNavColor() {
    const nav = document.querySelector('.nav');
    // console.log(window.getComputedStyle(nav).getPropertyValue('background-color'))

    if (!!document.querySelector('.nav[data-attribute=scroll]')) {

        if (window.scrollY > 200) {
            nav.style.backgroundColor = 'black';
        } else {
            nav.style.backgroundColor = 'transparent';
        }

    }
}