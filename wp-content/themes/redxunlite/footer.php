<?php
/**
 * The template for displaying the footer.
 *
 */
?>

<div class="clearfix"></div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<a class="sscroll totopbtn" href="#totop"><i class="fa fa-angle-up"></i></a>
		<div class="site-info container">
				<div class="footer-navigation">

				<?php	if ( true == get_theme_mod( 'logo_sectionfooter', true ) ) { ?>
		  	<a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
				<?php } ?>

				<nav class="footer-right-navigation">
					<ul id="menu-footer-right-items" class="menu-footer-right-items">
	        <?php if ( has_nav_menu( 'wtnfooter' ) ) {
						wp_nav_menu( array(
							'container' => '',
							'items_wrap' => '%3$s',
							'theme_location' => 'wtnfooter'
	        ) ); } ?>
	        </ul>
			 </nav>
				</div>

		    <section class="copyright">
		    <?php echo get_theme_mod( 'copyright_sectionfooter', '&copy; Redxun Theme by WowThemesNet'); ?>
		    </section>

		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</main><!-- /#content -->

<?php wp_footer(); ?>

<?php echo get_theme_mod( 'footer_sectiontracking'); ?>
</body>
</html>
