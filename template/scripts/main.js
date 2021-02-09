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