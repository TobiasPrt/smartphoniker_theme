/**
 * ES6 Class for Form
 * 
 * @package Smartphoniker
 * @since 1.1.5
 * @since 1.1.6 dynamic content type
 */


/** 
 * @typedef {import('./LoadingScreen.js').LoadingScreen} LoadingScreen 
 */

import { Input } from './Input.js';
import { AJAXRequest } from './AJAXRequest.js';


/** 
 * Class representing a form (and form controller).
 * 
 * @since 1.1.5
 */
export class Form {
    /** 
     * @type {HTMLFormElement} DOM-Element of the form. 
     */
    form;

    /**
     * @type {string} ID of form element.
     */
    formID;

    /**
     * @type {string} Endpoint for AJAX request.
     */
    endpoint;

    /**
     * @type {LoadingScreen} Handles loading animations.
     */
    loadingScreen;

    /**
     * @type {string} reCAPTCHA token for security.
     */
    recaptchaToken;

    /**
     * @type {boolean} True when inputs are valid.
     */
    inputsAreValid = true;

    /**
     * @type {Object} Response data of form submit. 
     */
    responses = new Object();

    /**
     * @type {number} Number of current response.
     */
    responseNumber = 0;

    /**
     * @type {string} content-type header for request.
     */
     contentType;

    /**
     * Create a Form.
     * 
     * @param {HTMLFormElement} form DOM-Element of the given form.
     * @param {LoadingScreen} loadingScreen Loading-Screen.
     * 
     * @since 1.1.5
     */
    constructor(form, loadingScreen, contentType = null) {
        this.form = form;
        this.formID = form.id;
        this.endpoint = form.getAttribute('data-admin-url');
        this.loadingScreen = loadingScreen;
        this.contentType = contentType;
    }

    /**
     * Add eventlisteners to form elements.
     *
     * @since 1.1.5
     */
    addFormEventListeners() {
        this.form.addEventListener('submit', event => {
            event.preventDefault();

            if (!this.inputsAreValid) {
                this.showError('Es wurden nicht alle Felder korrekt ausgefüllt. Überpüfen Sie ggf. auch die Checkboxen.');
                this.inputsAreValid = true;
                return;
            }

            this.submitForm();
        }, false);
    }

    /**
     * Validate inputfields
     *
     * @since 1.1.5
     */
    validateInputs() {
        /**
         * @type {NodeListOf<HTMLInputElement|HTMLTextAreaElement>}
         */
        const inputFields = this.form.querySelectorAll('input[type=text], input[type=email], textarea, input[checkboxtype=required]');

        inputFields.forEach(inputField => {
            /** 
             * @type {Input} 
             */
            const input = new Input(inputField);

            this.inputsAreValid = this.inputsAreValid && input.isValid();
        });
    }

    /**
     * Submit form.
     *
     * @since 1.1.5
     */
    async submitForm() {
        this.loadingScreen.start();
        this.recaptchaToken = await this.getRecaptchaToken();
        this.removeUnusedFormElements();

        /**
         * @type {FormData}
         */
        const formdata = new FormData(this.form);
        formdata.append('token', this.recaptchaToken);

        /**
         * @type {AJAXRequest}
         */
        const request = new AJAXRequest(this.endpoint, 'POST', null, this.contentType);
        request.setFormDataAsBody(formdata);

        /**
         * @type {Response}
         */
        const response = await request.send();
        if (response.status != 200) {
            this.showError('An error occured: ' + response.status.toString());
            return;
        }

        this.responses[this.responseNumber] = await response.json();

        // TODO: change this when I have time
        if (document.querySelector("#googleform > input[type=hidden]:nth-child(2)").value != "googleform") {
            this.loadingScreen.stop();
        } else {
            this.loadingScreen.setMessage(this.responses[this.responseNumber].data);
            this.loadingScreen.element.classList.toggle('loadingscreen--done');
        }
    }

    /**
     * Show user an error message.
     *
     * @param {string} message The message to show the user.
     * 
     * @since 1.1.5
     */
    showError(message) {
        /**
         * @type {HTMLParagraphElement}
         */
        const errorElement = this.form.querySelector('.form__error');
        errorElement.innerHTML = message;
        errorElement.style.display = 'block';
        errorElement.style.width = '100%';
        errorElement.classList.add('visible');
        console.error(message);
    }

    /**
     * Get reCAPTCHA token from Google.
     *
     * @return {Promise<string>}
     * 
     * @since 1.1.5
     */
    async getRecaptchaToken() {
        return new Promise((res) => {
            // @ts-ignore
            grecaptcha.ready(() => {
                const token = document.getElementById('grecaptcha').getAttribute('data-token');
                // @ts-ignore
                grecaptcha.execute(
                    token, { action: this.formID })
                    .then(
                        (/** @type {string | PromiseLike<string>} */ token) => {
                            return res(token);
                        }
                    );
            });
        });
    }

    /**
     * Remove unused form elements
     *
     * @since 1.1.5
     */
    removeUnusedFormElements() {
        if (this.form.querySelector('#select-manufacturer')) {
            /** 
             * @type {NodeListOf<HTMLSelectElement>} 
             */
            const allDeviceSelectFields = this.form.querySelectorAll('.form__select[name = modell]');

            /** 
             * @type {HTMLSelectElement}
             */
            const manufacturerSelectField = this.form.querySelector('select#select-manufacturer');
            /** 
             * @type {string}
             */
            const currentlySelectedManufacturer = manufacturerSelectField.options[manufacturerSelectField.selectedIndex].value;

            allDeviceSelectFields.forEach((deviceSelectField) => {
                if (deviceSelectField.id != currentlySelectedManufacturer) {
                    deviceSelectField.remove();
                }
            });
        }
    }
}