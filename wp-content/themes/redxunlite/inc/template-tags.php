<?php
/**
 * Custom template tags for this theme. Eventually, some of the functionality here could be replaced by core features.
 */

 //----------------------------------------------------
 // Page 1 of what plus prev/next posts in archive and index
 //-----------------------------------------------------
if ( ! function_exists( '_paging_nav' ) ) :
function _paging_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	?>
	<h6 class="paginate-head">
	<?php printf( __( 'Page', 'redxunlite' ).' %1$s '.__( 'of', 'redxunlite' ).' %2$s', $paged, $wp_query->max_num_pages ); ?>
  </h6>
	<?php if ( false == get_theme_mod( 'disablefixedsidenav_sectionlogonav', false ) ) { ?>
		<div class="sticky-prev-next">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="older-posts"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Posts', 'redxunlite' ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="newer-posts"><?php previous_posts_link( __( 'Newer Posts <span class="meta-nav">&rarr;</span>', 'redxunlite' ) ); ?></div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	<?php } ?>
	<?php
}
endif;


//-----------------------------------------------------
// Display fixed prev/next navigation for posts
//-----------------------------------------------------
if ( ! function_exists( '_post_nav' ) ) :
function _post_nav() {
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) {
		return;
	}
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	?>
	<?php if ( false == get_theme_mod( 'disablefixedsidenav_sectionlogonav', false ) ) { ?>
		<div class="sticky-prev-next">
			<?php	previous_post_link( '<div class="older-posts">%link</div>', _x( ' <span class="meta-nav">&larr;</span> Previous', 'Previous post link', 'redxunlite' ) ); ?>
			<?php next_post_link('<div class="newer-posts">%link</div>',     _x( 'Next <span class="meta-nav">&rarr;</span>', 'Next post link',     'redxunlite' ) );	?>
		</div>
		<?php } ?>
	<?php
}
endif;

//-----------------------------------------------------
// Posted on
//-----------------------------------------------------
if ( ! function_exists( '_posted_on' ) ) :
function _posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		//$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> by %2$s</span>', 'redxunlite' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;


//-----------------------------------------------------
// Returns true if a blog has more than 1 category.
//-----------------------------------------------------
function _categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );
		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}
	if ( '1' != $all_the_cool_cats ) {
		return true;
	} else {
		return false;
	}
}


//-----------------------------------------------------
// Tags in post
//-----------------------------------------------------
if ( ! function_exists( 'wtn_post_tags' ) ) :
function wtn_post_tags() {
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'redxunlite' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links">' . esc_html__( '%1$s', 'redxunlite' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;



//-----------------------------------------------------
// Category widget style, add span in nr
//-----------------------------------------------------
add_filter('wp_list_categories', 'add_span_cat_count');
function add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span>(', $links);
$links = str_replace(')', ')</span>', $links);
return $links;
}

//-----------------------------------------------------
// Strip archive titles
//-----------------------------------------------------
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">'. _e( 'Posts by ', 'redxunlite' )  . get_the_author() . '</span>' ;
        }
    return $title;
});

//-----------------------------------------------------
// Ad Blocks
//-----------------------------------------------------
if ( ! function_exists( 'wtn_ad_block_top_index' ) ) :
	function wtn_ad_block_top_index() {
		$topindexad = get_theme_mod('topindex_sectionad');
		if (!empty($topindexad) ) {
				echo '<div class="wtntopad">' . get_theme_mod( 'topindex_sectionad') .'</div>';
		}
	}
endif;

if ( ! function_exists( 'wtn_ad_block_bottom_index' ) ) :
	function wtn_ad_block_bottom_index() {
		$bottomindexad = get_theme_mod('bottomindex_sectionad');
		if (!empty($bottomindexad) ) {
	 echo '<div class="wtnbottomad">' . get_theme_mod( 'bottomindex_sectionad') .'</div>';
	}
}
endif;

if ( ! function_exists( 'wtn_ad_block_top_article' ) ) :
	function wtn_ad_block_top_article() {
			$toparticle = get_theme_mod('toparticle_sectionad');
			if (!empty($toparticle) ) {
			echo '<div class="wtntopadarticle ' . get_theme_mod( 'toparticleposition_sectionad') .'">' . get_theme_mod( 'toparticle_sectionad') .'</div>';
			}
	}
endif;

if ( ! function_exists( 'wtn_ad_block_bottom_article' ) ) :
	function wtn_ad_block_bottom_article() {
		$bottomarticle = get_theme_mod('bottomarticle_sectionad');
		if (!empty($bottomarticle) ) {
	  echo '<div class="wtnbottomadarticle">' . get_theme_mod( 'bottomarticle_sectionad') .'</div>';
	  }
 }
endif;

if ( ! function_exists( 'wtn_ad_block_inside_article' ) ) :
function wtn_ad_block_inside_article( $text ) {
$insideadarticle = get_theme_mod('insidearticle_sectionad');
if (  is_single()  && !empty($insideadarticle) ) :
    $ads_text = '<div class="wtninsideadarticle ' . get_theme_mod( 'insidearticleposition_sectionad') .'">' . get_theme_mod( 'insidearticle_sectionad') .'</div>';
    $split_by = "\n";
    $insert_after = get_theme_mod( 'insidearticleparagraphnumber_sectionad');
    $paragraphs = explode( $split_by, $text);
    $len = count( $paragraphs );
    if (  $len < $insert_after ) $insert_after = $len;
    array_splice( $paragraphs, $insert_after, 0, $ads_text );
    foreach( $paragraphs as $paragraph ) {
			  global $new_text;
        $new_text .= $paragraph;
    }
    return $new_text;
endif;
return $text;
}
add_filter('the_content', 'wtn_ad_block_inside_article');
endif;

//-----------------------------------------------------
// Get Author Name Linked
//-----------------------------------------------------
function wtn_author_info_name() {
global $post;
$a_user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
$a_display_name = get_the_author_meta( 'display_name', $post->post_author );
if ( empty( $display_name ) )
$a_display_name = get_the_author_meta( 'nickname', $post->post_author );
echo '<a href="'. $a_user_posts .'">' . $a_display_name . '</a>';
}

//-----------------------------------------------------
// Get Author Gravatar
//-----------------------------------------------------
function wtn_author_gravatar() {
global $post;
echo get_avatar( get_the_author_meta('user_email' , $post->post_author) , 54 );
}

//-----------------------------------------------------
// Author Box
//-----------------------------------------------------
function wtn_author_info_box() {
global $post;
$display_name = get_the_author_meta( 'display_name', $post->post_author );
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );
$user_description = get_the_author_meta( 'user_description', $post->post_author );
$user_website = get_the_author_meta('url', $post->post_author);
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
if ( ! empty( $display_name ) )
$author_details = '<h4 class="author_name"><span>By ' . $display_name . '</span></h4>';
if ( ! empty( $user_description ) )
$author_details .= '<div class="author_details">' . get_avatar( get_the_author_meta('user_email') , 60 ) . nl2br( $user_description ). '</div>';
$author_details .= '<div class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';
if ( ! empty( $user_website ) ) {
$author_details .= ' | <a href="' . $user_website .'" target="_blank">Website</a></div>';
} else {
$author_details .= '</div>';
}
// Pass all this info to post content
$content ='';
$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
return $content;
}
// Allow HTML in author bio section
remove_filter('pre_user_description', 'wp_filter_kses');


//-----------------------------------------------------
// Get 1st oembed
//-----------------------------------------------------
function get_first_embed_media() {
	global $post;
				$post_id = $post->ID;
    $post = get_post($post_id);
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $embeds = get_media_embedded_in_content( $content );

    if( !empty($embeds) ) {
        //return first embed
        return $embeds[0];

    } else {
        //No embeds found
        return false;
    }

}


//-----------------------------------------------------
// Page Excerpts
//-----------------------------------------------------
add_action( 'init', 'wtn_add_excerpts_to_pages' );
function wtn_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


//-----------------------------------------------------
// Bootstrap Gallery
//-----------------------------------------------------
add_filter( 'post_gallery', 'wtn_bootstrap_gallery', 10, 3 );
function wtn_bootstrap_gallery( $output = '', $atts, $instance )
{
    $atts = array_merge(array('columns' => 3), $atts);
    $columns = $atts['columns'];
    $images = explode(',', $atts['ids']);
    $col_class = 'col-md-4'; // default 3 columns
    if ($columns == 1) { $col_class = 'col-md-12';}
    else if ($columns == 2) { $col_class = 'col-md-6'; }
    // other column counts
    $return = '<div class="row gallery">';
    $i = 0;
    foreach ($images as $key => $value) {
        if ($i%$columns == 0 && $i > 0) {
            $return .= '</div><div class="row gallery">';
        }
        $image_attributes = wp_get_attachment_image_src($value, 'full');
        $return .= '
            <div class="'.$col_class.'">
                <a data-gallery="gallery" href="'.$image_attributes[0].'">
                    <img src="'.$image_attributes[0].'" alt="" class="img-responsive">
                </a>
            </div>';
        $i++;
    }
    $return .= '</div>';
    return $return;
}


//-----------------------------------------------------
// Flush out the transients used in _categorized_blog.
//-----------------------------------------------------
function _category_transient_flusher() {
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', '_category_transient_flusher' );
add_action( 'save_post',     '_category_transient_flusher' );
