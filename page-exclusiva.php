<?php
// Template Name: Exclusiva
get_header(); ?>

<?php
$user = wp_get_current_user();

$comprou = wc_customer_bought_product($user->user_email, $user->ID, 114);
?>

<?php if (have_posts()) {
  while (have_posts()) {
    the_post(); ?>

<h1 class="titulo"><?php the_title(); ?></h1>
<?php if($comprou) { ?>
<main class="container container-index"><?php the_content(); ?></main>
<?php } else { ?>

<p class="container">Essa página só pode ser vista por clientes que compraram o ebook</p>
<?php
  } ?>

<?php
  }
} ?>

<?php get_footer(); ?>