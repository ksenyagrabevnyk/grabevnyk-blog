<?php
/**
 * The Sidebar containing left widget areas.
 */
?>
<div class="skiptocontent">
	<a class="sscroll" href="#skippedtocontent">
		<?php echo __('Skip to Content', 'redxunlite'); ?> &darr;
	</a>
</div>
	<div id="sidebarleft" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) :
		endif;  ?>
	</div>
