<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'fsp_attach_theme_options');
function fsp_attach_theme_options()
{
  Container::make('theme_options', 'fsp_options', __('Site Password', 'full-site-password'))
    ->add_fields(array(
      Field::make('html', 'fsp_active', __('Active Badge', 'full-site-password'))
        ->set_html('<div class="fsp-badge active"><i class="dashicons dashicons-lock"></i> ' . __('Protected', 'full-site-password') . '</div>')
        ->set_width(20)
        ->set_classes('fsp-badge-wrapper')
        ->set_conditional_logic(array(
          array(
            'field' => 'fsp_show_content',
            'value' => true,
          ),
        )),
      Field::make('html', 'fsp_inactive', __('Inactive Badge', 'full-site-password'))
        ->set_html('<div class="fsp-badge inactive"><i class="dashicons dashicons-unlock"></i> ' . __('Unprotected', 'full-site-password') . '</div>')
        ->set_width(20)
        ->set_classes('fsp-badge-wrapper')
        ->set_conditional_logic(array(
          array(
            'field' => 'fsp_show_content',
            'value' => '',
          ),
        )),
      Field::make('checkbox', 'fsp_show_content', __('Activate Full Site Password', 'full-site-password'))
        ->set_option_value('yes')
        ->set_width(80),
      Field::make('text', 'fsp_password', __('Password', 'full-site-password'))
        ->set_attribute('type', 'password')
        ->set_required(true),
      /* 
        Field::make('html', 'fsp_html', 'HTML Button')
          ->set_html('<button  class="button button-primary show_hide_password" type="button">
          Show Password</button>'),
      */
      Field::make('text', 'fsp_title', __('Main Title', 'full-site-password'))->set_width(50),
      Field::make('text', 'fsp_description', __('Main Description', 'full-site-password'))->set_width(50),
      Field::make('text', 'fsp_footer_text', __('Footer Text', 'full-site-password'))->set_width(50),

      Field::make('text', 'fsp_error_text', __('Error Text', 'full-site-password'))->set_width(50),

      Field::make('color', 'fsp_bg_color', __('Background Color', 'full-site-password'))->set_width(50)->set_default_value("#000000"),
      Field::make('color', 'fsp_text_color', __('Text Color', 'full-site-password'))->set_width(50)->set_default_value("#ffffff"),

      Field::make('text', 'fsp_top_logo_size', __('Top Logo Width (px)', 'full-site-password'))->set_width(50),
      Field::make('text', 'fsp_main_image_size', __('Main Logo Width (px)', 'full-site-password'))->set_width(50),

      Field::make('image', 'fsp_top_logo', __('Top Logo', 'full-site-password'))->set_width(100 / 3)->set_classes('fsp-image-field'),
      Field::make('image', 'fsp_main_logo', __('Main Logo', 'full-site-password'))->set_width(100 / 3)->set_classes('fsp-image-field'),
      Field::make('image', 'fsp_bg', __('Background', 'full-site-password'))->set_width(100 / 3)->set_classes('fsp-image-field'),
    ));
}
