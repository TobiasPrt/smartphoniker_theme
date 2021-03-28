/**
 * ES6 Module: dynamic select on front page
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Sets up select on front page
 *
 * @since 1.0.0
 */
export function setupSelect() {
    const manufacturerSelectField = document.getElementById('select-manufacturer');

    manufacturerSelectField && setDefaultDeviceSelectField();
    manufacturerSelectField && addManufacturerSelectFieldEventListener(manufacturerSelectField);
    manufacturerSelectField && addDeviceSelectFieldEventListeners();
}


/**
 * Sets up the default options
 *
 * @since 1.0.0
 */
function setDefaultDeviceSelectField() {
    const defaultDeviceSelectField = document.querySelector('.select__select[name = modell]:nth-of-type(1)') || document.querySelector('.form__select[name = modell]:nth-of-type(1)');
    defaultDeviceSelectField.style.visibility = 'visible';
    setButtonURL(defaultDeviceSelectField);
}


/**
 * Sets the button to the correct URL
 *
 * @param {HTMLElement} deviceSelectField the currently active device select field
 *
 * @since 1.0.0
 */
function setButtonURL(deviceSelectField) {
    const url = deviceSelectField.options[deviceSelectField.selectedIndex].getAttribute('data-url');
    const button = document.getElementById('repair-device');
    button && button.setAttribute('href', url);
}


/**
 * Adds Event Listener to select for manufacturers
 *
 * @param {HTMLElement} selectManufacturer Select to add the Eventlistener to
 *
 * @since 1.0.0
 */
function addManufacturerSelectFieldEventListener(manufacturerSelectField) {
    manufacturerSelectField.addEventListener('change', changeActiveManufacturer, false);
}


/**
 * Fired when a change event on a manufacturer select is fired.
 * Hides all device selects except the choosen one and sets the correct url
 *
 * @since 1.0.0
 */
function changeActiveManufacturer() {
    const activeManufacturerOption = this.options[this.selectedIndex].value;

    let allDeviceSelectFields = document.querySelectorAll('.select__select[name = modell]');
    allDeviceSelectFields = allDeviceSelectFields.length === 0 ? document.querySelectorAll('.form__select[name = modell]') : allDeviceSelectFields;

    allDeviceSelectFields.forEach(deviceSelectField => {
        // if the field is the choosen one display it, else hide it
        if (deviceSelectField.id === activeManufacturerOption) {
            deviceSelectField.style.display = 'block';
            setButtonURL(deviceSelectField);
        } else {
            deviceSelectField.style.display = 'none';
        }
    });
}


/**
 * Adds eventlisteners to all device select fields.
 *
 * @since 1.0.0
 */
function addDeviceSelectFieldEventListeners() {
    const allDeviceSelectFields = document.querySelectorAll('.select__select[name = modell]');

    allDeviceSelectFields.forEach(deviceSelectField => {
        deviceSelectField.addEventListener('change', function (event) {
            setButtonURL(this);
        }, false);
    });
}