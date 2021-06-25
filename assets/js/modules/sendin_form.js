/**
 * ES6 Module: add event listeners for multi-step forms.
 *
 * @package Smartphoniker
 * @since 1.1.5
 */

import { LoadingScreen } from '../classes/LoadingScreen.js';
import { SendinForm } from '../classes/SendinForm.js';

/**
 * Sets up event listeners for all multi-step forms.
 *
 * @since 1.1.5
 */
export function initSendinForm() {
    /** 
     * @type {HTMLFormElement}
     */
    const sendinFormElement = document.querySelector('#sendin');

    /**
     * @type {HTMLDivElement}
     */
    let loadingScreenElement = document.querySelector('.loadingscreen');

    /**
     * @type {LoadingScreen}
     */
    let loadingScreen = new LoadingScreen(loadingScreenElement);

    new SendinForm(sendinFormElement, loadingScreen);
}