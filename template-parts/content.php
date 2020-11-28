<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SoftStak_Blogger_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if (has_post_thumbnail()) :
			the_post_thumbnail();
		endif;

		if (is_singular()) :
			the_content();
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				softstak_blogger_theme_posted_on();
				softstak_blogger_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php softstak_blogger_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php


		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'softstak-blogger-theme'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php softstak_blogger_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->