/**
 * Main script file.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */

import { addVideoEventListeners } from './modules/video.js';
import { addBannerEventListener } from './modules/banner.js';

addVideoEventListeners();
addBannerEventListener();