<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wp_title('|','true','right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
<?php echo get_theme_mod( 'head_sectiontracking'); ?>
</head>

<body <?php body_class(); ?>>

<?php
global $post;
$customhero =  do_shortcode (get_post_meta( get_the_ID(), 'redxunlite_page_settings_customhero', true ) );
get_template_part( 'partials/inlinestyle' );
get_template_part( 'partials/headermenu' );

if (
    ( is_single() || (is_page() ) )
    &&
    (!($customhero == null || $customhero == ''))
  )
  { ?>
  <div class="customhero">
    <?php echo $customhero; ?>
  </div>
<?php }  else {
   get_template_part( 'partials/headerhero' );
  } ?>

<main id="scroll-content" class="content" role="main">
