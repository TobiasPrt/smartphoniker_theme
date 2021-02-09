const nav = document.getElementById("nav");
const menuicon = document.getElementById("menuicon");

menuicon.addEventListener("click", () => {
    // Slide in Navigation
    nav.classList.toggle("nav__list--active");

    // Show Nav Links
    const navLinks = document.querySelectorAll(".nav__listitem");
    navLinks.forEach((link, index) => {
        if (link.style.animation) {
            link.style.animation = "";
        } else {
            link.style.animation = `navListitemFade 0.5s ease forwards ${index / 7 + 0.2
                }s`;
        }
    });

    // Toggle Burger and Cross
    menuicon.classList.toggle("menuicon--active");
});

const closeBanner = document.getElementById("closeBanner");

closeBanner.addEventListener("click", () => {
    const banner = document.getElementById("banner");
    const header = document.getElementById("header");

    // hide banner
    banner.classList.toggle("banner--isHidden");
    // reduce heigt of header
    header.classList.toggle("header--bannerIsHidden");
    // adjust starting point of overlay
    nav.classList.toggle("nav__list--bannerIsHidden");
});