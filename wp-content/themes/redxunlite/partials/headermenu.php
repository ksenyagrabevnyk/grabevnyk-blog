<!-- LOGO & MENU -->
<div id="totop"></div>
    <nav id="redxunlite-navigation" class="main-navigation <?php if ( true == get_theme_mod( 'menuanim_sectionlogonav', true ) ) { echo 'animated'; } ?>" role="navigation">

      <div class="container">
      <?php if ( get_theme_mod( 'logo_sectionlogonav' ) ) { ?>
          <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'logo_sectionlogonav' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
      <?php } else { ?>
        <a class="blog-text" href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        <?php } ?>

        <ul class="mobile-menu">
					<?php if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array(
							'container' => '',
							'items_wrap' => '%3$s',
							'theme_location' => 'primary'
						) ); } ?>
				</ul>

        <ul class="main-menu">
        <?php if ( has_nav_menu( 'primary' ) ) {
        						wp_nav_menu( array(
        							'container' => '',
        							'items_wrap' => '%3$s',
        							'theme_location' => 'primary'
        						) ); } ?>
            </ul>

            <div class="toggles">
						<div class="nav-toggle toggle">
              <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
						</div>
						<div class="clearfix"></div>
					</div> <!-- /toggles -->
			 	 <div class="clearfix"></div>

      </div>
    </nav>
