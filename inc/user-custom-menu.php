<?php

// Adicionar novo menu
add_filter("woocommerce_account_menu_items", function ($menu_links) {
  $menu_links =
    array_slice($menu_links, 0, 5, true) + ["certificados" => "Certificados"] +
    array_slice($menu_links, 0, null, true);

  // Adicionando Texto em falta
  if (!$menu_links["edit-address"]) {
    $menu_links["edit-address"] = "Editar endereço";
  }

  // Remove um Link
  unset($menu_links["downloads"]);

  return $menu_links;
});

add_action("init", function () {
  add_rewrite_endpoint("certificados", EP_PAGES);
});

add_action("woocommerce_account_certificados_endpoint", function () {
  ?>
<h2>Certificados</h2>
<?php echo "<p>Esses são os seus certificados</p>";
});

?>
