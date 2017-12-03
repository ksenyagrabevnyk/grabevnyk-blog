<?php

/**
 * _s Theme Customizer.
 *
 * @package _s
 */
if ( class_exists( 'Kirki_Fonts_Google' ) ) {
    Kirki_Fonts_Google::$force_load_all_variants = true;
}
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _s_customize_register( $wp_customize )
{
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', '_s_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js()
{
    wp_enqueue_script(
        '_s_customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'customize-preview' ),
        '20151215',
        true
    );
}

add_action( 'customize_preview_init', '_s_customize_preview_js' );
/**
 * Add the theme configuration
 */
_s_Kirki::add_config( '_redxunlite_theme', array(
    'option_type' => 'theme_mod',
    'capability'  => 'edit_theme_options',
) );
_s_Kirki::add_panel( 'mainthemepanel_redxun', array(
    'priority'    => 10,
    'title'       => __( 'Redxun Theme', 'redxunlite' ),
    'description' => __( 'Redxun Theme Options', 'redxunlite' ),
) );
//endifpremium
//-----------------------------------------------------
// SECTION: Logo & Menu
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionlogonav', array(
    'title'      => esc_attr__( 'Logo & Navigations', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'image',
    'settings'    => 'logo_sectionlogonav',
    'label'       => esc_html__( 'Logo', 'redxunlite' ),
    'description' => 'Maximum height should be 64px',
    'section'     => 'sectionlogonav',
    'priority'    => 10,
    'transport'   => 'auto',
    'default'     => '',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'checkbox',
    'settings' => 'menuanim_sectionlogonav',
    'label'    => esc_html__( 'Enable Menu Animation', 'redxunlite' ),
    'section'  => 'sectionlogonav',
    'priority' => 10,
    'default'  => '1',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'checkbox',
    'settings'    => 'disablefixedsidenav_sectionlogonav',
    'label'       => esc_html__( 'Disable Fixed Side Nav', 'redxunlite' ),
    'description' => 'Appears on articles/archives as fixed side nav (older/newer posts & prev/next post).',
    'section'     => 'sectionlogonav',
    'priority'    => 10,
    'default'     => '0',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'checkbox',
    'settings'    => 'disablefixedbottom_sectionlogonav',
    'label'       => esc_html__( 'Disable Fixed Bottom Nav', 'redxunlite' ),
    'description' => 'Appears on index/archives as fixed bottom nav (older/newer posts).',
    'section'     => 'sectionlogonav',
    'priority'    => 10,
    'default'     => '0',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'color',
    'settings'    => 'bg_fixedleftrightnav',
    'label'       => esc_attr__( 'Background Color Fixed Side Nav', 'redxunlite' ),
    'description' => 'If enabled, select the background color for fixed side navigation. If you are currently editing through Home page, please, select a post (article) so you can preview the modification.',
    'section'     => 'sectionlogonav',
    'priority'    => 10,
    'default'     => '#ffffff',
    'alpha'       => true,
) );
//-----------------------------------------------------
// SECTION: Home Intro
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionhomeintro', array(
    'title'      => esc_attr__( 'Blog Home Intro', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'      => 'image',
    'settings'  => 'bg_sectionhomeintro',
    'label'     => esc_html__( 'Blog Intro Image', 'redxunlite' ),
    'section'   => 'sectionhomeintro',
    'priority'  => 10,
    'transport' => 'auto',
    'default'   => '',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'textarea',
    'settings' => 'title_sectionhomeintro',
    'label'    => esc_attr__( 'Blog Intro Text', 'redxunlite' ),
    'section'  => 'sectionhomeintro',
    'priority' => 10,
    'default'  => 'This is Redxun',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'textarea',
    'settings' => 'subtitle_sectionhomeintro',
    'label'    => esc_attr__( 'Blog Intro Description', 'redxunlite' ),
    'section'  => 'sectionhomeintro',
    'priority' => 10,
    'default'  => 'Smart and great looking WordPress Theme',
) );
//-----------------------------------------------------
// SECTION: Custom BG Headers
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionbgheaders', array(
    'title'      => esc_attr__( 'Background Headers', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'image',
    'settings'    => 'bg_archiveheader',
    'label'       => esc_html__( 'Special Background Header', 'redxunlite' ),
    'description' => 'Archives, 404, Search Results. For "Homepage" top image, go back one level and select "Home Intro".',
    'section'     => 'sectionbgheaders',
    'priority'    => 10,
    'transport'   => 'auto',
    'default'     => '',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'image',
    'settings'    => 'bg_defaultheader',
    'label'       => esc_html__( 'Default Page Header', 'redxunlite' ),
    'description' => 'Posts and pages support individual custom background headers, by setting a featured image. When such a featured image is not set, this default image will be used. Also, this is a fallback for any page that has no custom header set.',
    'section'     => 'sectionbgheaders',
    'priority'    => 10,
    'transport'   => 'auto',
    'default'     => get_template_directory_uri() . '/img/defaultbg.jpg',
) );
//endifpremium
//-----------------------------------------------------
// SECTION: Layouts
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionlayouts', array(
    'title'      => esc_attr__( 'Layouts', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'radio-image',
    'settings'    => 'index_layout',
    'label'       => esc_html__( 'Main Index Layout', 'redxunlite' ),
    'description' => 'Select layout for home and archive pages',
    'section'     => 'sectionlayouts',
    'default'     => 'nosidebar',
    'priority'    => 10,
    'choices'     => array(
    'rightsidebar' => get_template_directory_uri() . '/img/2.jpg',
    'nosidebar'    => get_template_directory_uri() . '/img/3.jpg',
),
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'        => 'radio-image',
    'settings'    => 'article_layout',
    'label'       => esc_html__( 'Article Layout', 'redxunlite' ),
    'description' => 'Select the general layout for single articles. You can also set a special layout for an individual post only, via its editor.',
    'section'     => 'sectionlayouts',
    'default'     => 'nosidebar',
    'priority'    => 10,
    'choices'     => array(
    'rightsidebar' => get_template_directory_uri() . '/img/2.jpg',
    'nosidebar'    => get_template_directory_uri() . '/img/3.jpg',
),
) );

//-----------------------------------------------------
// SECTION: Footer
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionfooter', array(
    'title'      => esc_attr__( 'Footer', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );
//endifpremium
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'color',
    'settings' => 'footerlinks_sectionfooter',
    'label'    => esc_attr__( 'Footer Links Color', 'redxunlite' ),
    'section'  => 'sectionfooter',
    'priority' => 10,
    'default'  => '#ffffff',
    'alpha'    => true,
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'color',
    'settings' => 'bg_sectionfooter',
    'label'    => esc_attr__( 'Footer Background Color', 'redxunlite' ),
    'section'  => 'sectionfooter',
    'priority' => 10,
    'default'  => '#111111',
    'alpha'    => true,
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'checkbox',
    'settings' => 'logo_sectionfooter',
    'label'    => esc_attr__( 'Enable Footer Site Name', 'redxunlite' ),
    'section'  => 'sectionfooter',
    'priority' => 10,
    'default'  => '1',
) );
_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'textarea',
    'settings' => 'copyright_sectionfooter',
    'label'    => esc_attr__( 'Footer Copyright', 'redxunlite' ),
    'section'  => 'sectionfooter',
    'priority' => 10,
    'default'  => '&copy; Redxun Theme by WowThemesNet',
) );


//-----------------------------------------------------
// SECTION: Footer
//-----------------------------------------------------
_s_Kirki::add_section( 'sectionpro', array(
    'title'      => esc_attr__( 'Redxun Pro Demo', 'redxunlite' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
    'panel'      => 'mainthemepanel_redxun',
) );

_s_Kirki::add_field( '_redxunlite_theme', array(
    'type'     => 'custom',
    'settings' => 'demo_sectionpro',
    'section'  => 'sectionpro',
    'priority' => 10,
    'default'     => '<a target="_blank" style="padding: 20px;background-color: blue; text-align:center;color: #fff; border-radius: 50px;margin-top:10px;font-weight:700;display:block;" href="https://www.wowthemes.net/themes/redxun/?utm_source=upsell-dashboard-redxunlite&utm_campaign=ViewFrom%20Redxun%20Lite">' . esc_html__( 'Go Pro ($39)', 'redxunlite' ) . '</a>',
) );
