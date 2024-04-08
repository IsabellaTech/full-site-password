jQuery(document).ready(function ($) {
  // add div around the password field
  $('input[name="carbon_fields_compact_input[_fsp_password]"]').wrap(
    '<div class="password-field"></div>'
  );
  $(".password-field").append(
    '<div class="show_hide_password"><i class="dashicons dashicons-hidden"></i></div>'
  );
  $(".show_hide_password").on("click", function (event) {
    event.preventDefault();
    var $passwordInput = $(
      'input[name="carbon_fields_compact_input[_fsp_password]"]'
    );
    if ($passwordInput.attr("type") == "text") {
      $passwordInput.attr("type", "password");
      $(".show_hide_password i")
        .addClass("dashicons-hidden")
        .removeClass("dashicons-visibility");
    } else {
      $passwordInput.attr("type", "text");
      $(".show_hide_password i")
        .addClass("dashicons-visibility")
        .removeClass("dashicons-hidden");
    }
  });
});
