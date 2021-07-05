/**
 * ES6 Class for SendinForm
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * @typedef {import('./LoadingScreen.js').LoadingScreen} LoadingScreen
 */

import { MultistepForm } from "./MultistepForm.js";

/**
 * Class representing Sendin-form
 * 
 * @extends MultistepForm
 * 
 * @since 1.1.5
 */
export class SendinForm extends MultistepForm {
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

        this.addFormEventListeners();
    }

    /**
     * Add event listeners to all sendin form.
     *
     * @since 1.1.5
     */
    addFormEventListeners() {
        super.addFormEventListeners();

        this.form.addEventListener('submit', event => {
            event.preventDefault();

            /**
             * @type {number} Interval ID
             */
            const interval = setInterval(async () => {
                if (this.responses[this.responseNumber] != undefined) {
                    // wait for Promise of fetched data to resolve
                    await this.responses[this.responseNumber];

                    // Check if response was successful
                    if (!this.responses[this.responseNumber].success) {
                        this.showError(this.responses[this.responseNumber].data);
                        this.responseNumber++;
                        clearInterval(interval);
                        return;
                    }

                    // Make HTML ready to display summary
                    this.renderSummary(this.responses[this.responseNumber].data);

                    // Google Tag Manager Event
                    // @ts-ignore
                    if (window.dataLayer) {
                        // @ts-ignore
                        dataLayer.push({ 'event': 'sendin-device-success', 'sendin_device': this.responses[this.responseNumber].data.device.replace('&amp;', '&') });
                    }

                    // Move to the next step in form
                    this.updateStep(1);

                    // Stop Interval function
                    clearInterval(interval);
                }
            }, 200);
        }, false);
    }

    /**
     * Adds summary content to the DOM.
     * 
     * @param {object} data
     * 
     * @since 1.1.5
     */
    renderSummary(data) {
        const contactDataElement = document.querySelector('#sendin > div:nth-child(6) > div > div:nth-child(1) > p.ordersummary__text');
        const inquiryDataElement = document.querySelector('#sendin > div:nth-child(6) > div > div:nth-child(2) > p.ordersummary__text');

        contactDataElement.innerHTML = data.name + '<br>' + data.address + '<br>' + data.email;
        inquiryDataElement.innerHTML = data.device + '<br><br>' + data.message;
    }
}