<?php

/**
 * Config file for sfLightboxPlugin
 * 
 * @author lvernet
 * @since v1.0.0
 */

$plugin_name = 'sfLightboxPlugin';

// Resources paths, you can modifiy to fit your need
sfConfig::set('sf_lightbox_css_dir',    '/'. $plugin_name. '/css/');
sfConfig::set('sf_lightbox_images_dir', '/'. $plugin_name. '/images/');
sfConfig::set('sf_lightbox_js_dir',     '/'. $plugin_name. '/js/');