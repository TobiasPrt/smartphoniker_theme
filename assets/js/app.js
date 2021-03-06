/**
 * Main script file.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */

import { addVideoEventListeners } from './modules/video.js';
import { addBannerEventListener } from './modules/banner.js';
import { addNavigationEventListener } from './modules/navigation.js';
import { setupTabs } from './modules/tabs.js';

addVideoEventListeners();
addBannerEventListener();
addNavigationEventListener();
setupTabs();