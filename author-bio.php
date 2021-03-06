<?php
/**
 * Author description
 */

	if ( get_the_author_meta( 'description' ) ) :
?>
	<div class="author-info">
		<h2>
			<?php
				echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', 48 ) ) . '&nbsp;';
				printf( __( 'About %s', 'my-theme' ), get_the_author() );
			?>
		</h2>
		<div class="author-description">
			<?php the_author_meta( 'description' ); ?>
		</div>
		<div class="author-links">
			<?php
				if ( ! empty( get_the_author_meta( 'user_url' ) ) ) :
					printf( '<a href="%s" class="www mdc-button mdc-js-button">' . __( 'Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
				endif;
				
				// Add new Profile fields for Users in functions.php
				$fields = array(
					array(
						'meta'  => 'facebook_profile',
						'label' => 'Facebook',
					),
					array(
						'meta'  => 'twitter_profile',
						'label' => 'Twitter',
					),
					array(
						'meta'  => 'linkedin_profile',
						'label' => 'LinkedIn',
					),
					array(
						'meta'  => 'xing_profile',
						'label' => 'Xing',
					),
					array(
						'meta'  => 'github_profile',
						'label' => 'GitHub',
					),
				);
		
				foreach ( $fields as $key => $data ) {
					$author_link = get_the_author_meta( esc_attr( $data['meta'] ) );
					if ( ! empty( $author_link ) ) {
						$label = esc_html( $data['label'] );
						echo ' <a href="' . esc_url( $author_link ) . '" class="mdc-button mdc-js-button" title="' . $label . '">' . $label . '</a> ';
					}
				}
			?>
		</div>
	</div><!-- /.author-info -->

<?php endif; ?>
