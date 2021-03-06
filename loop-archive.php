<?php
/**
 * Loop template for the archive page.
 *
 * @package WordPress-960
 */
?>

<!-- Custom Title -->
<?php if ( is_category() ) : ?>
	<h2 class="archive-title"><?php _e('Category: '); single_cat_title(); ?></h2>
<?php elseif ( is_tag() ) : ?>
	<h2 class="archive-title"><?php _e('Tag: '); single_tag_title(); ?></h2>
<?php elseif ( is_author() ) : ?>
	<h2 class="archive-title"><?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	_e('Author: '); echo $curauth->nickname; ?></h2>
<?php endif; ?>

<!-- The loop -->
<?php if ( have_posts() ) :
while ( have_posts() ) {
	the_post();
	wp960_get_content( 'archive' );
}
else : ?>
	<p><?php _e( 'Sorry, no posts match your criteria.', 'wp960' ); ?></p>
<?php endif; ?>
