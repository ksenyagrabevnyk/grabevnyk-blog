<div class="entry-footer">
	<?php	if ( false == get_theme_mod( 'disableexcerptpostviewsmeta_sectionarticles', false ) ) {
	if (function_exists('pvc_get_post_views')) {
	printf('<span class="entry-views-count"><i class="fa fa-bar-chart"></i>%2$s <span>%3$s</span></span>',
	esc_url(get_permalink()),
	absint(pvc_get_post_views()),
	_n('View', 'Views', absint(pvc_get_post_views()), 'redxunlite')
	);
	}
}

	if (! post_password_required() && (comments_open() || get_comments_number())) {
	echo '<span class="entry-comments-count">';
	comments_popup_link(
	'<i class="fa fa-comment-o"></i>0 <span>' . esc_html__('Comments', 'redxunlite') . '</span>',
	'<i class="fa fa-comment-o"></i>1 <span>' . esc_html__('Comment', 'redxunlite') . '</span>',
	'<i class="fa fa-comment-o"></i>% <span>' . esc_html__('Comments', 'redxunlite') . '</span>'
	);
	echo '</span>';
	}
	?>
	<?php echo redxunlite_share_post(); ?>
	<div class="clearfix">
	</div>
</div>
