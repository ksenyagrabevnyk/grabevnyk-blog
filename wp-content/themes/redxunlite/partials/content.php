<?php
/**
 * Content
 */
?>
<section class="col-md-12 boxexcerpt">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( is_sticky() ) { ?>
	<div class='ribbon-wrapper-1'>
	      <div class='ribbon-1'><?php _e( 'Featured', 'redxunlite' ); ?></div>
	    </div>
<?php } ?>

<div class="thethumb">
		<?php	if ( has_post_thumbnail() ) { ?>
	    <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('large');?>
			</a>
	  <?php } ?>
</div>

	<div class="wrapbox <?php	if ( false == get_theme_mod( 'disablecenterexcerpt_sectionarticles', false ) ) { ?> text-center <?php } ?>">
		<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php	$category_list = get_the_category_list( __( ', ', 'redxunlite' ) );	?>
	    <header class="post-header">
	      <?php if ( 'post' == get_post_type() ) : ?>
					<?php	if ( false == get_theme_mod( 'disableexcerptheadermeta_sectionarticles', false ) ) { ?>
					<span class="post-meta">
						<?php
								_posted_on();
								printf( __( ' on ', 'redxunlite' ).'%1$s', $category_list );
		        	  edit_post_link( __( 'Edit&rarr;', 'redxunlite' ), '<span class="edit-link">&nbsp;&bull;&nbsp;', '</span>' );
						?>
					 </span>
				 <?php } ?>
			   <?php endif; ?>
	    </header>
			<?php the_excerpt();
			echo '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( '<span class="meta-read-more">Continue Reading &#8594;</span>', 'redxunlite' ) . '</a>';?>

			<?php	if ( false == get_theme_mod( 'disableexcerptfootermeta_sectionarticles', false ) ) { ?>
			<?php	get_template_part( 'partials/excerpt', 'footer' );	?>
			 <?php } ?>

		    <?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'redxunlite' ),
					'after'  => '</div>',
				) );
			?>
			<div class="clear">&nbsp;</div>
	</div>
	</article>
</section>
