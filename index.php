<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
*/

    get_header();

    $page_id = get_option('page_for_posts');
?>

	<div class="mdl-cell mdl-cell--12-col">
	<?php
		if ( is_page() && is_home() ) :
			echo nl2br( get_post_field('post_content', $page_id) );// = echo content from Bloghome
		endif;

		edit_post_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>', $page_id );
	?>
	</div><!-- /.mdl-cell -->

	<?php themes_starter_content_nav( 'nav-above' ); ?>

		<?php
			/** Loading only 3 latest posts (no themes_starter_content_nav!!!) *
			query_posts(array(
				'showposts' => 3
			));*/

			$count = 1;

			if ( have_posts() ) : while (have_posts()): the_post();

				get_template_part( 'content', 'index' ); // Post format: content-index.php
				comments_template( '', false );

				if ( $count%2 == 0) echo '<div class="clearfix"></div>'; // clearfix after 2 posts

				$count++;

			endwhile; endif; wp_reset_query(); // end of the loop.
		?>

	<?php themes_starter_content_nav( 'nav-below' ); ?>

<?php get_footer(); ?>
