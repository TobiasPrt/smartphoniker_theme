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
function processFormEvent(event) {
    event.preventDefault();
    const endpoint = this.getAttribute('data-admin-url');
    const formdata = createFormDataObject(this);
    sendData(endpoint, formdata);
}


/**
 * Formats and returns the form data.
 *
 * @param {object} form form object
 *
 * @return { FormData } FormData object
 * 
 * @since 1.0.0
 */
function createFormDataObject(form) {
    const queryString = new URLSearchParams(new FormData(form)).toString();
    let formdata = new FormData;
    formdata.append('action', form.id);
    formdata.append(form.id, queryString)
    return formdata;
}


/**
 * Sends the data to the wordpress API endpoint.
 *
 * @param   {string}  endpoint  endpoint url
 * @param   {FormData}  data FormData object for the body
 *
 * @since 1.0.0
 */
async function sendData(endpoint, data) {
    let response = await fetch(endpoint, {
        method: "POST",
        body: data
    });

    if (!response.ok) {
        alert(response.status);
    }

    const body = await response.json();

    alert(body.data);
}
