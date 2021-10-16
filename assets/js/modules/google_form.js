/**
 * ES6 Module: add event listeners for googleform forms.
 *
 * @package Smartphoniker
 * @since 1.1.6
 */

import { LoadingScreen } from '../classes/LoadingScreen.js';
import { Form } from '../classes/Form.js';
 
 /**
  * Sets up event listeners for googleform
  *
  * @since 1.1.6
  */
 export function initGoogleForm() {
     /** 
      * @type {HTMLFormElement}
      */
     const googleFormElement = document.querySelector('#googleform');
     
     /**
      * @type {HTMLDivElement}
      */
     let loadingScreenElement = document.querySelector('.loadingscreen');
     
     
     /**
      * @type {LoadingScreen}
      */
     let loadingScreen = new LoadingScreen(loadingScreenElement);
     
     if (googleFormElement) {
         const googleForm = new Form(googleFormElement, loadingScreen, 'application/x-www-form-urlencoded;charset=UTF-8');
         googleForm.addFormEventListeners();
    }
 }