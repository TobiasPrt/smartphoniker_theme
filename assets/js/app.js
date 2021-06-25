/**
 * Main script file.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.1.5 Added initMultistepForms.
 */

import { setupSelect } from './modules/select.js';
import { addVideoEventListeners } from './modules/video.js';
import { addBannerEventListener } from './modules/banner.js';
import { addNavigationEventListener } from './modules/navigation.js';
import { setupTabs } from './modules/tabs.js';
import { addFormEventListener } from './modules/form.js';
import { addScrollEventListener } from './modules/scroll.js';
import { initSendinForm } from './modules/sendin_form.js';

setupSelect();
addVideoEventListeners();
addBannerEventListener();
addNavigationEventListener();
setupTabs();
addFormEventListener();
addScrollEventListener();

initSendinForm();