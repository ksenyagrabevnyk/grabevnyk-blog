<?php
/**
 * The template part for displaying related posts.
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$queryby = 'tag__in';
$args    = array(
    'post__not_in'   => array(get_the_ID()),
    'posts_per_page' => '10',
    'post_status'    => 'publish',
    'ignore_sticky_posts' => true
);

if ($queryby == 'tags') {
    $args['tag__in'] = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));
}
else {
    $args['category__in'] = wp_get_post_categories(get_the_ID());
}

$related = new WP_Query($args);
?>

<?php if ($related->have_posts()) : ?>




    <div class="related-posts">

      <div class="fixedrp">

      <div class="related-posts-header text-center">
          <h5 class="widget-title related-posts-title">
              <span><?php echo __('Related', 'redxunlite'); ?></span>
          </h5>
      </div>

        <div class="wraprecentposts">

        <div class="posts-list posts-list-vertical">
            <?php while($related->have_posts()) : $related->the_post(); ?>
                <div class="posts-list-item">

                    <div class="rpthumb">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="posts-list-item-thumbnail">
                              <?php the_post_thumbnail('relatedpoststhumbnails'); ?>
                        </a>
                    <?php endif; ?>
                   </div>

                    <div class="posts-list-item-content">
                        <h6 class="posts-list-item-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h6>

                        <div class="posts-list-item-meta">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

      </div>
    </div>
  </div>
<?php endif;

wp_reset_query();
wp_reset_postdata(); ?>
