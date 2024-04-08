<?php
require_once(ABSPATH . 'wp-load.php');

$top_logo = carbon_get_theme_option('fsp_top_logo') ? wp_get_attachment_image_url(carbon_get_theme_option('fsp_top_logo'), 'full') : false;
$main_logo = carbon_get_theme_option('fsp_main_logo') ?  wp_get_attachment_image_url(carbon_get_theme_option('fsp_main_logo'), 'full') : false;
$bg = carbon_get_theme_option('fsp_bg') ? wp_get_attachment_image_url(carbon_get_theme_option('fsp_bg'), 'full') : false;
$title = carbon_get_theme_option('fsp_title') ?: false;
$head_title = carbon_get_theme_option('fsp_title') ?: 'Access Required';

$description = carbon_get_theme_option('fsp_description') ?: false;
$footer_text = carbon_get_theme_option('fsp_footer_text') ?: false;
$bg_color =  carbon_get_theme_option('fsp_bg_color') ?: "#000000";
$text_color =  carbon_get_theme_option('fsp_text_color') ?: "#ffffff";
$top_logo_size = carbon_get_theme_option('fsp_top_logo_size') ?: "35";
$main_logo_size = carbon_get_theme_option('fsp_main_image_size') ?: "400";

$error_message = $_SESSION['error_message'] ?? false;


?>
<!DOCTYPE html>
<html lang=<?php echo esc_html(get_locale()); ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo esc_html($head_title) ?></title>
  <?php wp_head(); ?>

  <style>
    /* Root Variables */
    :root {
      --bg-color: <?php echo esc_html($bg_color) ?>;
      --text-color: <?php echo esc_html($text_color) ?>;
    }
  </style>
</head>

<body>
  <div class="fsp-container">
    <?php if ($top_logo) : ?>
      <header class="fsp-header">
        <img src="<?php echo esc_url($top_logo); ?>" alt="<?php esc_html_e('Top Logo', 'full-site-password'); ?>" class="" width="<?php echo esc_html($top_logo_size); ?>">
      </header>
    <?php endif; ?>
    <div class="fsp-content <?php echo $bg ? "dark" : "light"; ?>" style="background-image: url(<?php echo $bg ? esc_url($bg) :  "" ?>);">
      <div class="fsp-content-bg">
        <div>
          <?php if ($main_logo) : ?>
            <div class="fsp-margin"><img src="<?php echo esc_url($main_logo); ?>" width="<?php echo esc_html($main_logo_size) ?>" alt="<?php esc_html_e('Main Logo', 'full-site-password'); ?>"></div>
          <?php endif ?>
          <div>
            <?php if ($title) : ?>
              <h1><?php echo esc_html($title); ?></h1>
            <?php endif ?>
            <?php if ($description) { ?>
              <p><?php echo esc_html($description); ?></p>
            <?php } ?>
          </div>
          <div class="fsp-form-wrapper">
            <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="fsp-form">
              <?php wp_nonce_field('fsp_access_password_nonce', '_wpnonce'); ?>

              <div class="fsp-input">
                <div class="fsp-label">
                  <?php esc_html_e('Password', 'full-site-password'); ?>:
                </div>
                <input type="password" name="access_password" required placeholder="<?php esc_html_e('Write password...', 'full-site-password') ?>">
              </div>
              <button type="submit">
                <?php esc_html_e('Submit', 'full-site-password'); ?></button>
            </form>
            <?php if ($error_message) { ?>
              <p class="fsp-error-message"><?php echo esc_html($error_message); ?></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php if ($footer_text) { ?>
      <footer class="fsp-footer">
        <?php echo esc_html($footer_text); ?>
      </footer>
    <?php } ?>
  </div>
  <?php wp_footer(); ?>

</body>

</html>