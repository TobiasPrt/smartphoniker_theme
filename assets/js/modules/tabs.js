/**
 * ES& Module: tabbed job postings
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Sets up Tabs for job posting
 *
 * @since 1.0.0
 */
export function setupTabs() {
    const tabs = document.querySelectorAll(".jobs__tab-button");
    tabs && setDefaultTab();
    tabs && addTabEventListeners(tabs);
}


/**
 * sets the first tab as the default tab
 *
 * @since 1.0.0
 */
function setDefaultTab(tabs) {
    tabs && document.querySelector('.jobs__tab-heading').classList.add('jobs__tab-heading--active');
    tabs && document.querySelector('.jobs__tab-content').classList.add('jobs__tab-content--active');
}


/**
 * Adds eventlisters for tabs
 *
 * @since 1.0.0
 */
function addTabEventListeners(tabs) {
    tabs.forEach(tab => {
        tab.addEventListener('click', switchActiveTab, false);
    });
}


/**
 * Switches active tab
 *
 * @param {event} event click event
 *
 * @since 1.0.0
 */
function switchActiveTab(event) {
    closeCurrentTab();
    unsetActiveHeading();
    setActiveHeading(event);
    openNewTab(this);
}


/**
 * Closes current active tab
 *
 * @since 1.0.0
 */
function closeCurrentTab() {
    document.querySelector('.jobs__tab-content--active').classList.remove('jobs__tab-content--active');
}


/**
 * Unsets current active heading
 * 
 * @since 1.0.0
 */
function unsetActiveHeading() {
    document.querySelector('.jobs__tab-heading--active').classList.remove('jobs__tab-heading--active');
}


/**
 * sets clicked heading as active
 *
 * @param {[event]} event clickevent
 *
 * @since 1.0.0
 */
function setActiveHeading(event) {
    event.target.classList.add('jobs__tab-heading--active');
}


/**
 * Opens the new tab
 *
 * @param {object} clickedObject the clicked object
 *
 * @since 1.0.0
 */
function openNewTab(clickedObject) {
    const tabId = clickedObject.getAttribute('data-id');
    document.getElementById(tabId).classList.add('jobs__tab-content--active')
}