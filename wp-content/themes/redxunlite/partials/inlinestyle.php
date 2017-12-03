<?php
$disablemeta =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disablemeta', true );
$disablecrumbs =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disablecrumbs', true );
$disableshare =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disableshare', true );
$disabletags =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disabletags', true );
$disableauthorbox =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disableauthorbox', true );
$disablefixednav =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disablefixednav', true );
$disablerelated =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disablerelated', true );
$disableribbons =  get_theme_mod( 'disableexcerptribbons_sectionarticles', false );
$enablebottomshadow =  get_theme_mod( 'enablebottomshadow_sectionother', false );
$enabletopshadow =  get_theme_mod( 'enablemenushadow_sectionother', false );
$accentcolor = get_theme_mod( 'accentcolor_sectionother', '#ed1c24' );
$enablefullheighthero =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_enablefullheighthero', false );
$layouttop =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_layouttop', true );
$disabletopad =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disabletopad', true );
$disableinsidead =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disableinsidead', true );
$disablbottomad =  get_post_meta( get_the_ID(), 'redxunlite_page_settings_disablebottomad', true );
?>
<style>
body {background-color:<?php echo get_theme_mod( 'bg_sectionother', '#ffffff' ); ?> ;}
.widget_redxunlite_recent_posts .title:hover, .widget-area .widget_categories ul li a:hover, .nav-links a:hover, #crumbs ul li a:hover {color:<?php echo $accentcolor; ?> ; }
.meta-read-more:hover, .widget input[type=submit].search-submit, .sticky .ribbon-1, .error404  .search-submit, .bypostauthor b.fn {background-color:<?php echo $accentcolor; ?> ;}
.site-footer {background-color:<?php echo get_theme_mod( 'bg_sectionfooter', '#111111' ); ?> ;}
.site-footer a {color:<?php echo get_theme_mod( 'footerlinks_sectionfooter', '#ffffff' ); ?> ;}
.older-posts, .newer-posts {background-color:<?php echo get_theme_mod( 'bg_fixedleftrightnav', '#ffffff' ); ?> ;}
<?php

if ( $disabletopad) { ?> .wtntopadarticle {display:none;} <?php }
if ( $disableinsidead) { ?> .wtninsideadarticle {display:none;} <?php }
if ( $disablbottomad) { ?> .wtnbottomadarticle {display:none;} <?php }

if ( $disablecrumbs) { ?> #crumbs {display:none;} <?php }
if ( $disablemeta) { ?> .single .blog-description {display:none;} <?php }
if ( $disableshare) { ?> .single .entry-share-links {display:none;} <?php }
if ( $disabletags) { ?> .tags-links {display:none;} <?php }
if ( $disableauthorbox) { ?> .author_bio_section {display:none;} <?php }
if ( $disablerelated) { ?> .related-posts {display:none;} <?php }
if  ( $disablefixednav) { ?> .single .sticky-prev-next {display:none;} <?php }
if ( $disableribbons) { ?> .ribbon-wrapper-1 {display:none;} <?php }
if ( $enablebottomshadow) { ?> .fixedrp {box-shadow:0 -3px 10px 0 rgba(0,0,0,.0785);border:0;} <?php }
if ( $enabletopshadow) { ?> .main-navigation {box-shadow:0 3px 10px 0 rgba(0,0,0,.0785);} <?php }
if (  ( ( $layouttop == 'center-bottom' )  && ( is_single() ) )  || ( ( $layouttop == 'center-bottom' )  && ( is_page() ) ) ) { ?>
  .shortcover .coverheadline, .coverheadline, .middletopheader .coverheadline {padding:0;text-align:center; position: absolute;  z-index: 1;  right: 0px;  bottom: 50px;  left: 0px;}
  .separateline { margin-left: auto; margin-right: auto; margin-top: 30px; }
  .shortcover.site-head, .site-head {  height: 100%;padding:0;}
  <?php }
if ( ( ( $layouttop == 'center-middle' )  && ( is_single() ) ) || ( ( $layouttop == 'center-middle' )  && ( is_page() ) ) ){ ?>
    .coverheadline,   .shortcover .coverheadline, .coverheadline, .middletopheader .coverheadline { position: relative;  right: auto;  bottom: auto; left: auto; margin-right: auto; margin-left: auto; text-align: center;}
    .separateline { margin-left:auto; margin-right:auto;margin-top:30px;}
    .shortcover.site-head, .site-head {  height: 100%;padding:0;}
    <?php }
if ( ( ( $layouttop == 'center-short' )  && ( is_single() ) ) || ( ( $layouttop == 'center-short' )  && ( is_page() ) ) ){ ?>
  .coverheadline,   .shortcover .coverheadline, .coverheadline, .middletopheader .coverheadline {z-index: 1;position: relative;right: auto;bottom: auto;left: auto;margin-right: auto;margin-left: auto;    text-align: center;}
  .shortcover.site-head, .site-head { padding: 134px 0 70px;  height: auto;}
  .separateline { margin-left:auto; margin-right:auto;margin-top:30px;}
    <?php }
if ( ( ( $layouttop == 'left-short' )  && ( is_single() ) ) || ( ( $layouttop == 'left-short' )  && ( is_page() ) ) ) { ?>
  .coverheadline,   .shortcover .coverheadline, .coverheadline, .middletopheader .coverheadline {z-index: 1;position: relative;right: auto;bottom: auto;left: auto;margin-right: auto;margin-left: auto;    text-align: left;}
  .shortcover.site-head, .site-head { padding: 134px 0 70px;  height: auto;}
  .fullheightbottomcenter .separateline, .shortheightbottomcenter .separateline, .middletopheader .separateline { margin-left:0; margin-right:0;}
    <?php } ?>

</style>
