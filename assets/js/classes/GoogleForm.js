/**
 * ES6 Class for GoogleForm
 *
 * @package Smartphoniker
 * @since 1.1.6
 */


/**
 * @typedef {import('./LoadingScreen.js').LoadingScreen} LoadingScreen
 */

 import { Form } from './Form.js';
 import { AJAXRequest } from './AJAXRequest.js';

 /** 
  * Class representing a googleform 
  * 
  * @extends Form
  * 
  * @since 1.1.6
  */
 export class GoogleForm extends Form {
     /**
      * Create a GoogleForm
      * 
      * @param {HTMLFormElement} form DOM-Element of the given form.
      * @param {LoadingScreen} loadingScreen Loading-Screen.
      * 
      * @since 1.1.6
      */
     constructor(form, loadingScreen) {
         super(form, loadingScreen);
     }
 
     /**
      * Add event listeners to all multi-step form specific buttons.
      * 
      * @since 1.1.6
      */
     addFormEventListeners() {
         super.addFormEventListeners();

        //  this.form.addEventListener('submit', async event => {
        //      event.preventDefault();

        //      if(this.responses[this.responseNumber] != undefined) {
        //         // wait for Promise of fetched data to resolve
        //         await this.responses[this.responseNumber];
        //      }
        //  }, false);
     }

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

        this.loadingScreen.setMessage(this.responses[0].data);
    }
 }