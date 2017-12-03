<?php

/**
 * The Template for displaying all single posts.
 */
get_header();
global  $post ;
$enablelayout = get_post_meta( get_the_ID(), 'redxunlite_page_settings_enablelayout', true );
$layout = get_post_meta( get_the_ID(), 'redxunlite_page_settings_layout', true );
?>

<?php 

if ( $enablelayout ) {
    get_template_part( 'partials/layout', 'single' );
} else {
    ?>

<div class="container maininnercontent">

	  <?php 
    
    if ( get_theme_mod( 'article_layout' ) == 'bothsidebars' ) {
        ?>
    <div class="col-sm-3"> <?php 
        get_sidebar();
        ?>
	</div>
	  <?php 
    }
    
    
    if ( get_theme_mod( 'article_layout' ) == 'bothsidebars' ) {
        ?>
		<div class="col-sm-6" id="skippedtocontent">
	  <?php 
    } else {
        
        if ( get_theme_mod( 'article_layout' ) == 'rightsidebar' ) {
            ?>
		<div class="col-sm-9">
		<?php 
        } else {
            ?>
			<div class="narrowcontent">
		<?php 
        }
    
    }
    
    ?>


		<?php 
    while ( have_posts() ) {
        the_post();
        ?>
	  <?php 
        get_template_part( 'partials/content', 'single' );
        ?>
		<?php 
        _post_nav();
        ?>
	  <?php 
        
        if ( false == get_theme_mod( 'disablerp_sectionarticles', false ) ) {
            ?>
		<?php 
            ?>
		<?php 
        }
        
        ?>
		<div class="clearfix"></div>
		<?php 
        if ( comments_open() || '0' != get_comments_number() ) {
            comments_template();
        }
        ?>
		<?php 
    }
    ?>
	</div>

	<?php 
    
    if ( get_theme_mod( 'article_layout' ) == 'bothsidebars' || get_theme_mod( 'article_layout' ) == 'rightsidebar' ) {
        ?>
	 <div class="col-sm-3">
		 <?php 
        get_sidebar( 'right' );
        ?>
	 </div>
	 <?php 
    }
    
    ?>

	</div>

	<?php 
}

get_footer();