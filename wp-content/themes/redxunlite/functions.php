<?php

/**
 * Functions and definitions
 *
 */

//-----------------------------------------------------
// Setups
//-----------------------------------------------------
if ( !function_exists( '_setup' ) ) {
    function _setup()
    {
        if ( !isset( $content_width ) ) {
            $content_width = 640;
        }
        load_theme_textdomain( 'redxunlite', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_image_size(
            'square-size',
            50,
            50,
            true
        );
        add_image_size(
            'relatedpoststhumbnails',
            328,
            160,
            array( 'top', 'top' )
        );
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'redxunlite' ),
            'wtnfooter' => __( 'Footer Menu', 'redxunlite' ),
        ) );
        add_theme_support( 'post-formats', array( 'video', 'audio' ) );
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery'
        ) );
    }

}
add_action( 'after_setup_theme', '_setup' );
//----------------------------------------------------
// Register Widgets
//-----------------------------------------------------
if ( !function_exists( '_widgets_init' ) ) {
    function _widgets_init()
    {
        register_sidebar( array(
            'name'          => __( 'Sidebar Right', 'redxunlite' ),
            'id'            => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title"><span>',
            'after_title'   => '</span></h1>',
        ) );
    }

}
// _widgets_init
add_action( 'widgets_init', '_widgets_init' );
//-----------------------------------------------------
// Styles & Scripts
//-----------------------------------------------------
if ( !function_exists( '_scripts' ) ) {
    function _scripts()
    {
        wp_register_style( 'redxunlite-bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'redxunlite-bootstrapcss' );
        wp_register_style( 'redxunlite-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'redxunlite-fa' );
        wp_enqueue_style( 'redxunlite-style', get_stylesheet_uri() );
        wp_enqueue_script(
            'redxunlite-bootstrapjs',
            get_template_directory_uri() . '/js/bootstrap.min.js',
            array( 'jquery' ),
            '1.0.0',
            true
        );
        wp_enqueue_script(
            'redxunlite-index',
            get_template_directory_uri() . '/js/main.js',
            array( 'jquery' ),
            '1.0.0',
            true
        );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

}
add_action( 'wp_enqueue_scripts', '_scripts' );

//-----------------------------------------------------
// Add Roboto
//-----------------------------------------------------
function redxunlite_fonts() {
            wp_register_style('redxunlite-googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,700italic,400,700,300');
            wp_enqueue_style( 'redxunlite-googleFonts');
        }
    add_action('wp_print_styles', 'redxunlite_fonts');

//-----------------------------------------------------
// Require
//-----------------------------------------------------
require_once get_template_directory() . '/inc/template-tags.php';
include_once get_template_directory() . '/inc/options/include-kirki.php';
include_once get_template_directory() . '/inc/options/kirki-fallback.php';
include_once get_template_directory() . '/inc/options/customizer.php';
require_once get_template_directory() . '/inc/jetpack.php';
//-----------------------------------------------------
// Editor Styles
//-----------------------------------------------------
if ( !function_exists( '_add_editor_styles' ) ) {
    function _add_editor_styles()
    {
        add_editor_style( 'css/custom-editor-style.css' );
    }

}
add_action( 'after_setup_theme', '_add_editor_styles' );
//endifpremium
//-----------------------------------------------------
// Share
//-----------------------------------------------------
if ( !function_exists( 'redxunlite_share_links' ) ) {
    function redxunlite_share_links( $args = array() )
    {
        ob_start();
        $args = wp_parse_args( $args, array(
            'brands'  => 'facebook, twitter, pinterest, google-plus, email',
            'url'     => '',
            'text'    => '',
            'icon'    => true,
            'label'   => true,
            'pattern' => '%s',
        ) );
        $args['brands'] = explode( ',', $args['brands'] );
        $args['brands'] = array_map( 'trim', $args['brands'] );
        $config = array(
            'facebook'    => array(
            'name'  => esc_html__( 'Facebook', 'redxunlite' ),
            'icon'  => '<i class="fa fa-facebook"></i>',
            'url'   => 'https://www.facebook.com/sharer/sharer.php',
            'query' => array(
            'u' => $args['url'],
            't' => $args['text'],
        ),
        ),
            'twitter'     => array(
            'name'  => esc_html__( 'Twitter', 'redxunlite' ),
            'icon'  => '<i class="fa fa-twitter"></i>',
            'url'   => 'https://twitter.com/intent/tweet',
            'query' => array(
            'url'  => $args['url'],
            'text' => $args['text'],
        ),
        ),
            'pinterest'   => array(
            'name'  => esc_html__( 'Pinterest', 'redxunlite' ),
            'icon'  => '<i class="fa fa-pinterest"></i>',
            'url'   => 'http://pinterest.com/pin/create/button/',
            'query' => array(
            'url'         => $args['url'],
            'description' => $args['text'],
        ),
        ),
            'google-plus' => array(
            'name'  => esc_html__( 'Google+', 'redxunlite' ),
            'icon'  => '<i class="fa fa-google-plus"></i>',
            'url'   => 'https://plus.google.com/share',
            'query' => array(
            'url' => $args['url'],
        ),
        ),
            'email'       => array(
            'name'  => esc_html__( 'Email', 'redxunlite' ),
            'icon'  => '<i class="fa fa-envelope"></i>',
            'url'   => 'mailto:',
            'query' => array(
            'subject' => $args['text'],
            'body'    => $args['url'],
        ),
        ),
        );
        foreach ( $args['brands'] as $key => $value ) {
            if ( !array_key_exists( $value, $config ) ) {
                continue;
            }
            $brand = $config[$value];
            $query = array_filter( $brand['query'] );
            $query = http_build_query( $query );
            if ( !$query ) {
                return;
            }
            if ( $value == 'email' ) {
                $query = urldecode( $query );
            }
            printf( $args['pattern'] . '
', sprintf(
                '<a target="_blank" href="%1$s">%2$s%3$s</a></li>',
                esc_url( $brand['url'] . '?' . $query ),
                ( $args['icon'] ? wp_kses( $brand['icon'], array(
                'i' => array(
                'class' => true,
            ),
            ) ) : '' ),
                ( $args['label'] ? '<span>' . esc_html( $brand['name'] ) . '</span>' : '' )
            ) );
        }
        return ob_get_clean();
    }

}
//actual HTML
if ( !function_exists( 'redxunlite_share_post' ) ) {
    function redxunlite_share_post( $class = '' )
    {
        ob_start();
        ?>
        <div class="entry-share-links<?php
        echo  esc_attr( ( $class ? ' ' . $class : '' ) ) ;
        ?>
">
            <span class="entry-share-links-label"><i class="fa fa-share-alt"></i><span><?php
        esc_html_e( 'Share:', 'redxunlite' );
        ?>
</span></span>
            <ul>
                <?php
        echo  redxunlite_share_links( array(
            'pattern' => '<li>%s</li>',
            'url'     => esc_url( get_permalink() ),
            'text'    => esc_html( get_the_title() ),
        ) ) ;
        ?>
            </ul>
        </div>
        <?php
        return ob_get_clean();
    }

}
//-----------------------------------------------------
// Breadcrumb
//-----------------------------------------------------
function the_breadcrumb()
{
    echo  '<div id="crumbs"><ul><li class="ico"><i class="fa fa-angle-double-right"></i></li>' ;

    if ( !is_home() ) {
        echo  '<li><a href="' ;
        echo  home_url() ;
        echo  '">' ;
        echo  'Home' ;
        echo  '</a></li>' ;

        if ( is_category() || is_single() ) {
            echo  '' ;
            the_category( '' );

            if ( is_single() ) {
                echo  '<li>' ;
                the_title();
                echo  '</li>' ;
            }

        } elseif ( is_page() ) {
            echo  '<li>' ;
            echo  the_title() ;
            echo  '</li>' ;
        }

    } elseif ( is_tag() ) {
        single_tag_title();
    } elseif ( is_day() ) {
        echo  '<li>Archive for ' ;
        the_time( 'F jS, Y' );
        echo  '</li>' ;
    } elseif ( is_month() ) {
        echo  '<li>Archive for ' ;
        the_time( 'F, Y' );
        echo  '</li>' ;
    } elseif ( is_year() ) {
        echo  '<li>Archive for ' ;
        the_time( 'Y' );
        echo  '</li>' ;
    } elseif ( is_author() ) {
        echo  '<li>Author Archive' ;
        echo  '</li>' ;
    } elseif ( isset( $_GET['paged'] ) && !empty($_GET['paged']) ) {
        echo  '<li>Blog Archives' ;
        echo  '</li>' ;
    } elseif ( is_search() ) {
        echo  '<li>Search Results' ;
        echo  '</li>' ;
    }

    echo  '</ul></div>' ;
}


//-----------------------------------------------------
// Hello, World
//-----------------------------------------------------
if ( is_admin() && ! is_child_theme() ) {
	require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
}
