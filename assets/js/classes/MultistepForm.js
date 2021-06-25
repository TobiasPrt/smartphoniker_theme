/**
 * ES6 Class for MultistepForm
 *
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * @typedef {import('./LoadingScreen.js').LoadingScreen} LoadingScreen
 */

import { Form } from './Form.js';

/** 
 * Class representing a multi-step form (and controller of the form). 
 * 
 * @extends Form
 * 
 * @since 1.1.5
 */
export class MultistepForm extends Form {
    /**
     * @type {number} Current active step in form.
     */
    step;

    /**
     * @type {NodeListOf<HTMLDivElement>} A group represents the view for a given step.
     */
    groups;

    /**
     * @type {HTMLDivElement} Shows the current position inside the multistepform.
     */
    progressbar;

    /**
     * Create a MultistepForm
     * 
     * @param {HTMLFormElement} form DOM-Element of the given form.
     * @param {LoadingScreen} loadingScreen Loading-Screen.
     * 
     * @since 1.1.5
     */
    constructor(form, loadingScreen) {
        super(form, loadingScreen);

        this.step = 0;
        this.groups = form.querySelectorAll('.multistepform__group');
        this.progressbar = form.querySelector('.progressbar');
    }

    /**
     * Add event listeners to all multi-step form specific buttons.
     * 
     * @since 1.1.5
     */
    addFormEventListeners() {
        super.addFormEventListeners();
        /**
         * @type {NodeListOf<HTMLButtonElement>}
         */
        const buttons = this.form.querySelectorAll('.multistepform__group > button[data-role=navigation]');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                this.updateStep(parseInt(button.getAttribute('data-value')));
            }, false);
        });

    }

    /**
     * Update the current step in the multi-step form.
     *
     * @param {number} steps Positive/Negative amount of steps to take.
     * 
     * @since 1.1.5
     */
    updateStep(steps) {
        this.closeStep();
        this.step = this.step + steps;
        this.updateProgressbar();
        this.openStep();
    }

    /**
     * Close the current step.
     *
     * @since 1.1.5
     */
    closeStep() {
        this.groups.forEach(group => {
            group.classList.remove('visible');
        });
    }

    /**
     * Open the current step.
     *
     * @since 1.1.5
     */
    openStep() {
        this.groups.forEach((group, index) => {
            if (index === this.step) group.classList.add('visible');
        });
    }

    /**
     * Update the progressbar.
     *
     * @since 1.1.5
     */
    updateProgressbar() {
        /** 
         * @type {NodeListOf<HTMLElement>}
         */
        const progressbarParts = this.progressbar.querySelectorAll('.progressbar__part');

        progressbarParts.forEach((progressbarPart, index) => {
            if (index <= this.step) {
                progressbarPart.classList.add('progressbar__part--active');
            } else {
                progressbarPart.classList.remove('progressbar__part--active');
            }
        });
    }
}