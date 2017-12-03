<?php
/**
 * The Sidebar containing footer widget areas.
 */
?>
	<div id="secondary" class="widget-area footersidebar" role="complementary">
		<div class="container">
		<?php if ( ! dynamic_sidebar( 'sidebar-footer' ) ) :
		endif; ?>
	</div>
	</div>
