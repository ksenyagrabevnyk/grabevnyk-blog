<?php
/**
  * Post format video
 */
?>
<div class="col-md-12 boxexcerpt">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class='ribbon-wrapper-1'>
	      <div class='ribbon-1 bgpurple'><?php _e( 'Video', 'redxunlite' ); ?></div>
	    </div>
<?php echo get_first_embed_media();?>

<div class="graybg wrapbox <?php	if ( false == get_theme_mod( 'disablecenterexcerpt_sectionarticles', false ) ) { ?> text-center <?php } ?>">
	<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
</div>
</article><!-- #post-## -->
</div>
