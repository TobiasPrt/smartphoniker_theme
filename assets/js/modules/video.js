/**
 * ES6 Module: video block
 * 
 * @package Smartponiker
 * @since 1.0.0
 */


/**
* Adds event listeners for all videos.
*
* @since 1.0.0
*/
export function addVideoEventListeners() {
    const videos = document.querySelectorAll('.video');

    videos && videos.forEach(video => {
        video.addEventListener('click', () => loadVideo(video));
    });
}


/**
 * Replaces video placeholder with iframe.
 *
 * @since 1.0.0
 * 
 * @param {Element} video ID to video container element.
 */
function loadVideo(video) {
    const videoLink = video.getAttribute('data-yt-id');
    video.classList.toggle('no-pseudo-elements');
    video.innerHTML = '<iframe src="' + videoLink + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}