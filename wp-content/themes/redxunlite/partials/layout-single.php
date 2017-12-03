<?php
global $post;
$layout = get_post_meta( get_the_ID(), 'redxunlite_page_settings_layout', true );
?>

<div class="container">

	  <?php  if ( $layout == 'default' )  { ?>
    <div class="col-md-3"> <?php get_sidebar(); ?>	</div>
	  <?php }

	  if ( $layout == 'default' )  { ?>
		<div class="col-md-6">
	  <?php }

		 if ( $layout == 'rightsidebar' )  { ?>
		<div class="col-md-9">
		<?php }

		 if ( $layout == 'nosidebar' )  { ?>
		<div class="narrowcontent">
		<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>
	  <?php get_template_part( 'partials/content', 'single' ); ?>
		<?php _post_nav(); ?>
	  <?php	if ( false == get_theme_mod( 'disablerp_sectionarticles', false ) ) { ?>
		<?php get_template_part('partials/related', 'posts'); ?>
		<?php } ?>
		<div class="clearfix"></div>
		<?php	if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;	?>
		<?php endwhile; ?>
	</div>

	<?php if ( ( $layout == 'default' )  || ( $layout == 'rightsidebar' )  ) { ?>
	 <div class="col-md-3">
		 <?php get_sidebar('right'); ?>
	 </div>
	 <?php } ?>

	</div>
