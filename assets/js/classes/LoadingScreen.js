/**
 * ES6 Class for LoadingScreen
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

"use strict";

/** 
 * Class handling a loadingscreen-widget. 
 * 
 * @since 1.1.5
 */
export class LoadingScreen {
    /**
     * @type {HTMLDivElement} HTML Dom-Element of the loading screen.
     */
    element;

    /**
     * @type {HTMLDivElement} Message for the user.
     */
    message;

    /**
     * Create a LoadingScreen.
     * 
     * @param {HTMLDivElement} loadingScreen The Dom-Element of the loading screen.
     *
     * @since 1.1.5
     */
    constructor(loadingScreen) {
        this.element = loadingScreen;
        this.message = loadingScreen.querySelector('.loadingscreen__message');
    }

    /**
     * Start loading animation.
     *
     * @since 1.1.5
     */
    start() {
        this.element.classList.remove('loadingscreen--done');
        this.element.classList.add('loadingscreen--active');
    }

    /**
     * Stop loading animation.
     *
     * @since 1.1.5
     */
    stop() {
        if (this.message) {
            this.element.classList.remove('loadingscreen--active');
            this.element.classList.add('loadingscreen--done');
        }
    }

    /**
     * Set message.
     *
     * @param {string} message The new message to show the user.
     *
     * @since 1.1.5
     */
    setMessage(message) {
        this.message.innerHTML = message;
    }
}