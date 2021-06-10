/**
 * ES6 Module: add event listeners for multi-step forms.
 *
 * @package Smartphoniker
 * @since 1.1.5
 */

import { MultistepForm } from '../classes/MultistepForm.js';

/**
 * Sets up event listeners for all multi-step forms.
 *
 * @since 1.1.5
 */
export function addMultistepFormEventListeners() {
    const multistepForms = document.querySelectorAll('.multistepform');

    multistepForms.forEach(form => {
        new MultistepForm(form);
    });
}