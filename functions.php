<?php

add_action("after_setup_theme", function () {
  add_theme_support("woocommerce");
});

add_action("wp_enqueue_scripts", function () {
  wp_register_style(
    "handel-style",
    get_template_directory_uri() . "/style.css",
    [],
    "1.0.0"
  );
  wp_enqueue_style("handel-style");
});

add_action("wp_enqueue_scripts", function () {
  wp_register_script(
    "handel-slide",
    get_template_directory_uri() . "/js/slide.js",
    [],
    "1.0.0",
    true
  );
  wp_enqueue_script("handel-slide");
});

add_action("wp_enqueue_scripts", function () {
  wp_register_script(
    "handel-script",
    get_template_directory_uri() . "/js/script.js",
    [],
    "1.0.0",
    true
  );
  wp_enqueue_script("handel-script");
});

add_action("after_setup_theme", function () {
  add_image_size("slide", 1000, 800, ["center", "top"]);
  update_option("medium_crop", 1);
});

add_filter("loop_shop_per_page", function () {
  return 6;
});

add_filter("body_class", function ($classes) {
  $woo_class = array_search("woocommerce", $classes);
  $woopage_class = array_search("woocommerce-page", $classes);
  $search =
    in_array("archive", $classes) ||
    in_array("product-template-default", $classes);
  if ($woo_class && $woopage_class && $search) {
    unset($classes[$woo_class]);
    unset($classes[$woopage_class]);
  }
  return $classes;
});

add_filter("woocommerce_enable_order_notes_field", "__return_false");

add_action("woocommerce_account_dashboard", function () {
  echo "Origamid";
});

include get_template_directory() . "/inc/product-list.php";
include get_template_directory() . "/inc/user-custom-menu.php";
include get_template_directory() . "/inc/checkout-customizado.php";

add_filter("woocommerce_email_footer_text", function ($text) {
  echo 'Handel
  <ul style="padding: 0px; margin: 0px; list-style: none;">
    <li><a href="/">Facebook</a></li>
    <li><a href="/">Instagram</a></li>
    <li><a href="/">YouTube</a></li>
  </ul>';
});

add_action("woocommerce_email_order_meta", function ($order) {
  $mensagem = get_post_meta($order->get_id(), "mensagem_personalizada", true);
  $presente = get_post_meta($order->get_id(), "_billing_presente", true);

  echo '<h2 style="margin: -20px 0 10px 0px;">Detalhes</h2>
    <p style="font-size: 16px; border: 1px solid #e5e5e5; padding: 10px; margin-bottom: 0px;"><strong>Mensagem: </strong>' .
    $mensagem .
    '</p>
    <p style="font-size: 16px; border: 1px solid #e5e5e5; padding: 10px;"><strong>Presente: </strong>' .
    $presente .
    '</p>
  ';
});

?>
