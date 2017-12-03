<article id="post-<?php the_ID();?>">
    <?php if ( is_search() ) {
    ?>
		<section class="post-excerpt">
	        <p><?php the_excerpt(); ?></p>
    	  </section><!-- .entry-summary -->
      	<?php } else { ?>

  		<section class="post-content">
        <div class="clearfix"></div>
        <?php ?>
        <div class="actualarticle" id="skippedtocontent">
  		    <?php the_content(); ?>
        </div>
        <?php
        if ( false == get_theme_mod( 'disabletags_sectionarticles', false ) ) {
        ?>
        <?php wtn_post_tags(); ?>
        <?php }  ?>


  			<?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'redxunlite' ),
            'after'  => '</div>',
        ) );
        ?>
  			<div class="clearfix"></div>
    	</section>

  	<?php } ?>
</article>
