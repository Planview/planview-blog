<div class="rp4wp-related-posts rp4wp-related-<?php echo esc_attr( $post_type ); ?>">

	<?php
	if ( '' != $heading_text ) {
		$heading = "<h4>" . $heading_text . "</h4>";
		echo apply_filters( 'rp4wp_heading', $heading );
	}
	?>
	<div class="row rp4wp-posts-list">
		<?php
		global $post;
		$o_post      = $post;
		$row_counter = 0;
		foreach ( $related_posts as $post ) {

			// Setup the postdata
			setup_postdata( $post );

			// Load the content template
			$manager_template = new RP4WP_Manager_Template();

			$manager_template->get_template( 'related-post-default.php', array(
				'related_post'   => $post,
				'excerpt_length' => $excerpt_length,
				'row_counter'    => $row_counter,
				'parent'         => $o_post
			) );

			$row_counter ++;
		}
		$post = $o_post;
		wp_reset_postdata();
		?>
	</div>
</div>