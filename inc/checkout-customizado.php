<?php

add_filter("woocommerce_checkout_fields", function ($fields) {
  //unset($fields["billing"]["billing_phone"]);

  $fields["billing"]["billing_presente"] = [
    "label" => "Embrulhar para Presente?",
    "required" => false,
    "class" => ["form-row-wide"],
    "clear" => true,
    "type" => "select",
    "options" => [
      "nao" => "Não",
      "sim" => "Sim",
    ],
  ];

  return $fields;
});

add_action("woocommerce_admin_order_data_after_shipping_address", function (
  $order
) {
  $presente = get_post_meta($order->get_id(), "_billing_presente", true);
  echo "<p><strong>Presente:</strong> " . $presente . "</p>";
});

add_action("woocommerce_after_order_notes", function ($checkout) {
  woocommerce_form_field(
    "mensagem_personalizada",
    [
      "type" => "textarea",
      "class" => ["form-row-wide mensagem_personalizada"],
      "label" => "Mensagem Personalizada",
      "placeholder" =>
        "Escreva uma mensagem para a pessoa que você está presenteando",
    ],
    $checkout->get_value("mensagem_personalizada")
  );
});

// Adicionar ao Banco de Dados
add_action("woocommerce_checkout_update_order_meta", function ($order_id) {
  if (!empty($_POST["mensagem_personalizada"])) {
    update_post_meta(
      $order_id,
      "mensagem_personalizada",
      sanitize_text_field($_POST["mensagem_personalizada"])
    );
  }
});

add_action("woocommerce_admin_order_data_after_shipping_address", function (
  $order
) {
  $mensagem = get_post_meta($order->get_id(), "mensagem_personalizada", true);
  echo "<p><strong>Mensagem:</strong> " . $mensagem . "</p>";
});

?>
