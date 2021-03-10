/**
 * ES6 Module: tabbed job postings
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Sets up eventlistener for all forms
 *
 * @since 1.0.0
 */
export function addFormEventListener() {
    const forms = document.querySelectorAll('.form');
    forms.forEach(form => {
        form.addEventListener('submit', processFormEvent, false);
    })
}


/**
 * Processes the form data.
 *
 * @param {event} event submit event
 *
 * @since 1.0.0
 */
async function processFormEvent(event) {
    event.preventDefault();

    toggleLoadingScreen();

    /** 
     * @var {string} message the message delivered to the user 
     */
    let message;

    try {
        const token = await getToken(this);
        const endpoint = this.getAttribute('data-admin-url');
        const formdata = createFormDataObject(this, token);
        message = await sendData(endpoint, formdata);
    } catch (e) {
        message = e;
    } finally {
        toggleLoadingScreen(message);
        console.log(message);
    }
}


/**
 * Toggles loading screena and shows message
 *
 * @since 1.0.0
 */
function toggleLoadingScreen(message = null) {
    const loader = document.querySelector('.loadingscreen');
    if (message) {
        loader.querySelector('.loadingscreen__message').innerHTML = message;
        loader.classList.toggle('loadingscreen--done');
    } else {
        loader.classList.toggle('loadingscreen--active');
    }
}


/**
 * Gets Google reCaptcha v3 token
 *
 * @param {object} form form object
 *
 * @return {Promise<string>} reCaptcha token
 * 
 * @since 1.0.0
 */
async function getToken(form) {
    return new Promise((res, rej) => {
        grecaptcha.ready(() => {
            grecaptcha.execute('6LfMjnYaAAAAAGEDka5XbfUwvQPJHNP4hKvSnaed', { action: form.id }).then((token) => {
                return res(token);
            })
        });
    });
}


/**
 * Formats and returns the form data.
 *
 * @param {object} form form object
 *
 * @return {FormData} FormData object
 * 
 * @since 1.0.0
 */
function createFormDataObject(form, token) {
    document.getElementById('g-recaptcha-response').value = token;
    const queryString = new URLSearchParams(new FormData(form)).toString();
    let formdata = new FormData;
    formdata.append('action', 'form');
    formdata.append('data', queryString);
    formdata.append('token', token);
    return formdata;
}


/**
 * Sends the data to the wordpress API endpoint.
 *
 * @param {string} endpoint endpoint url
 * @param {FormData} data FormData object for the body
 * 
 * @return {Promise<string>} message from server
 *
 * @since 1.0.0
 */
async function sendData(endpoint, data) {
    let response = await fetch(endpoint, {
        method: "POST",
        body: data
    });

    if (!response.ok) {
        return response.status;
    }
    const body = await response.json();
    return body.data;
}
