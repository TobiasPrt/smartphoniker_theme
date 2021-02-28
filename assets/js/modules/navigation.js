/**
 * ES6 Module: navigation
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Adds event listener for navigation.
 *
 * @since 1.0.0
 */
export function addNavigationEventListener() {
    const menuIcon = document.getElementById("menuicon");
    menuIcon && menuIcon.addEventListener('click', () => toggleNavigation());
}


/**
 * Toggles visibility of navigation on small screens.
 *
 * @since 1.0.0
 */
function toggleNavigation() {
    document.getElementById("nav").classList.toggle("nav__list--active");
    animateNavigationItems();
    menuicon.classList.toggle("menuicon--active");
}


/**
 * Animate navigation items.
 *
 * @since 1.0.0
 */
function animateNavigationItems() {
    const navLinks = document.querySelectorAll(".nav__listitem");
    navLinks.forEach((link, index) => {
        if (link.style.animation) {
            link.style.animation = "";
        } else {
            link.style.animation = `navListitemFade 0.5s ease forwards ${index / 7 + 0.2
                }s`;
        }
    });
}