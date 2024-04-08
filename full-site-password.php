<?php
/*
Plugin Name: Full Site Password
Plugin URI: http://isabellatech.com/full-site-password
Description: Displays a password screen for the entire website until the correct password is entered.
Version: 1.0
Author: Isabella Tech
Author URI: http://isabellatech.com
Text Domain: full-site-password
Domain Path: /languages
*/

if (!defined('FSP_VERSION')) {
  define('FSP_VERSION', '1.0');
}

if (!defined('FSP_PATH')) {
  define('FSP_PATH', plugin_dir_path(__FILE__));
}

if (!defined('FSP_URL')) {
  define('FSP_URL', plugin_dir_url(__FILE__));
}

function fsp_load()
{
  require_once('vendor/autoload.php');
  \Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme', 'fsp_load');

require_once FSP_PATH . 'inc/carbon-fields.php';

require_once FSP_PATH . 'inc/access-control.php';

function enqueue_admin_assets($hook_suffix)
{
  if ($hook_suffix != 'toplevel_page_crb_carbon_fields_container_fsp_options') return;

  wp_enqueue_script('fsp-admin-scripts', FSP_URL . 'js/fsp-scripts-admin.js', array('jquery'), FSP_VERSION, true);
  wp_enqueue_style('fsp-admin-styles', FSP_URL . 'css/fsp-styles-admin.css', array(), FSP_VERSION);

  wp_enqueue_style('dashicons');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_assets');

function enqueue_front_assets()
{
  $is_active = carbon_get_theme_option('fsp_show_content');
  if (!$is_active) return;

  wp_enqueue_style('fsp-styles', FSP_URL . 'css/fsp-styles.css', array(), FSP_VERSION);
}
add_action('wp_enqueue_scripts', 'enqueue_front_assets');

function wpdocs_load_textdomain()
{
  load_plugin_textdomain('full-site-password', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('after_setup_theme', 'wpdocs_load_textdomain');
