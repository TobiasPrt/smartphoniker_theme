/**
 * ES6 Class for an AJAX request.
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

"use strict";

/**
 * Class representing an AJAX request.
 * 
 * @since 1.1.5
 */
export class AJAXRequest {
    /**
     * @type {string} endpoint Target URL for request.
     */
    endpoint;

    /**
     * @type {string} method The method used for the request.
     */
    method;

    /**
     * @type {string} body Body of the request.
     */
    body;

    /**
     * Creates new AJAXRequest.
     *
     * @param {string} endpoint Target URL for request.
     * @param {('GET'|'POST'|'PUT'|'DELETE')} method The method used for the request.
     * @param {string} [body] Optional body for the request.
     * 
     * @since 1.1.5
     */
    constructor(endpoint, method, body = '') {
        this.endpoint = endpoint;
        this.method = method;
        this.body = body;
    }

    /**
     * Set formdata object as body for the request.
     *
     * @param {FormData} formdata A formdata object.
     * 
     * @since 1.1.5
     */
    setFormDataAsBody(formdata) {
        // @ts-ignore
        this.body = new URLSearchParams(formdata).toString();
        // console.log('Request: ' + this.body);
    }

    /**
     * Send AJAX request.
     *
     * @return {Promise<Response>} Unvalidated Response object.
     * 
     * @since 1.1.5
     */
    async send() {
        try {
            /** 
             * @type {Response}
             */
            return await fetch(this.endpoint, {
                method: this.method,
                headers: {
                    // 'Content-Type': 'application/json'
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: this.body
            });
        } catch (e) {
            console.error(e);
        }
    }
}