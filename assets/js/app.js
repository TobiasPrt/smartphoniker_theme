/**
 * Main script file.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */

import { setupSelect } from './modules/select.js';
import { addVideoEventListeners } from './modules/video.js';
import { addBannerEventListener } from './modules/banner.js';
import { addNavigationEventListener } from './modules/navigation.js';
import { setupTabs } from './modules/tabs.js';
import { addFormEventListener } from './modules/form.js';

setupSelect();
addVideoEventListeners();
addBannerEventListener();
addNavigationEventListener();
setupTabs();
addFormEventListener();