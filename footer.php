<footer class="footer">
    <img src="<?= get_stylesheet_directory_uri() ?>/img/handel-white.svg" alt="Handel">
    <div class="container footer-info">
        <section>
            <h3>Páginas</h3>
            <?php wp_nav_menu([
              "menu" => "footer",
              "container" => "nav",
              "container_class" => "footer-menu",
            ]); ?>
        </section>
        <section>
            <h3>Redes Sociais</h3>
            <?php wp_nav_menu([
              "menu" => "redes",
              "container" => "nav",
              "container_class" => "footer-redes",
            ]); ?>
        </section>
        <section>
            <h3>Pagamentos</h3>
            <ul>
                <li>Cartão de Crédito</li>
                <li>Boleto Bancário</li>
                <li>PagSeguro</li>
            </ul>
        </section>
    </div>
    <?php
    $countries = WC()->countries;
    $base_address = $countries->get_base_address();
    $base_address_2 = $countries->get_base_address_2();
    $base_city = $countries->get_base_city();
    $base_state = $countries->get_base_state();
    $complete_address = "{$base_address} - {$base_address_2}, {$base_city} - {$base_state}";
    ?>
    <small class="footer-copy">
        Handel &copy; <?= date("Y") ?> - <?= $complete_address ?>
    </small>
</footer>




<?php wp_footer(); ?>
</body>

</html>