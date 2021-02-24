const banner = document.getElementById('banner');
const header = document.getElementById('header');
const nav = document.getElementById('nav');

function closeBanner() {
    banner.classList.toggle("banner--isHidden");
    header.classList.toggle("header--bannerIsHidden");
    nav.classList.toggle("nav__list--bannerIsHidden");
}


function addBannerEventListener() {
    banner && banner.addEventListener('click', closeBanner)
}

export { addBannerEventListener };