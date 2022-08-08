<?php
/**
 * Plugin Name: CF7 Style Modification
 * Plugin URI: https://github.com/rashu-pro/cf7-style-modification
 * Description: Contact Form 7 default style modification
 * Version: 1.0.0
 * Author: Rashu Nath
 * Author URI: https://github.com/rashu-pro
 * Text Domain: cf7-style-modification
 * Domain Path: /languages/
 */

/*
CF7 Style Modification is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

$plugin_name = 'cf7_style_modification';
define( 'CF7_STYLE_MODIFICATION_VERSION', '1.0.0' );
define( 'CF7_STYLE_PLUGIN', __FILE__ );
define( 'CF7_STYLE_PLUGIN_DIR', untrailingslashit( dirname( CF7_STYLE_PLUGIN ) ) );

register_activation_hook(__file__,'cf7_style_activation');

function cf7_style_activation(){

}

function cf7_style_modification_add_styles(){
    $warning_image = 'wp-content/plugins/cf7-style-modification/public/images/attention.png';
    $success_image = 'wp-content/plugins/cf7-style-modification/public/images/accept_20.png';
    $custom_css = "
.wpcf7-response-output{
    position:relative;
	line-height:1.4;
	font-family:inherit;
	display:flex;
	align-items:flex-start;
	font-family:inherit;
}
.wpcf7 form.invalid .wpcf7-response-output {
	color:#202020!important;
    background: #fff3cd;
    border-color: #ffeeba!important;
}
.wpcf7 form.invalid .wpcf7-response-output:before {
    content: url($warning_image);
    padding-right: 11px;
    position:relative;
    top:-2px;
}
.wpcf7 form.sent .wpcf7-response-output{
	color: #155724!important;
    background-color: #d4edda;
    border-color: #c3e6cb!important;
	display:flex;
	align-items:center;
}
.wpcf7 form.sent .wpcf7-response-output:before{
    content:url($success_image);
    padding-right: 11px;
    position:relative;
    top:0px;
}";
    wp_register_style( 'cf7-style-handle', false );
    wp_enqueue_style( 'cf7-style-handle' );
    wp_add_inline_style('cf7-style-handle', $custom_css);
}

if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
    add_action('wp_enqueue_scripts', 'cf7_style_modification_add_styles', 1);
}
