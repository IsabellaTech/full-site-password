<?php

function fsp_access_control()
{
  $correct_password = carbon_get_theme_option('fsp_password');
  if (!carbon_get_theme_option('fsp_show_content') || !$correct_password) {
    return;
  }


  if (isset($_POST['access_password']) && isset($_POST['_wpnonce'])) {
    // Verify nonce
    if (!wp_verify_nonce($_POST['_wpnonce'], 'fsp_access_password_nonce')) {
      // Nonce verification failed, handle as needed (e.g., display error message)
      return;
    }

    if ($_POST['access_password'] === $correct_password) {
      $_SESSION['has_access'] = true;
    } else {
      $_SESSION['error_message'] = carbon_get_theme_option('fsp_error_text') ?: __('Incorrect password. Please try again.', 'full-site-password');
    }
  }

  if (!isset($_SESSION['has_access']) || !$_SESSION['has_access']) {
    $maintenance_template = FSP_PATH . 'templates/fsp-template-1.php';
    if (file_exists($maintenance_template)) {
      http_response_code(503);
      include($maintenance_template);
      exit();
    }
  }
}
add_action('template_redirect', 'fsp_access_control');

function fsp_start_session()
{
  if (!session_id()) {
    session_start();
  }
}
add_action('init', 'fsp_start_session');
