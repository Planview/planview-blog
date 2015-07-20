
	<?php
	$prev_post = get_previous_post( true );
	$next_post = get_next_post( true );
	?>

	<?php
	if (!empty( $prev_post )): 
		$prev_ID = $prev_post->ID;
		$prev_title = apply_filters( 'the_title', $prev_post->post_title );
		$prev_link = get_permalink( $prev_ID );
		$prev_thumb = get_the_post_thumbnail( $prev_ID, 'prev-next-thumb' );
	?>

		<div id="previous-post" onClick="location.href='<?php echo $prev_link; ?>'" class="prev-next">
			<div class="arrow">
				<i class="fa fa-chevron-left"></i>
			</div>
			<div class="media">
				<div class="media-body">
					<div class="media-heading">Previous</div>
					<a href="<?php echo $prev_link; ?>"><?php echo $prev_title; ?></a>
				</div>
				<?php if ($prev_thumb): ?>
					<div class="media-right">
						<a href="<?php echo $prev_link; ?>">
							<?php echo $prev_thumb; ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php 
	if (!empty( $next_post )): 
		$next_ID = $next_post->ID;
		$next_title = apply_filters( 'the_title', $next_post->post_title );
		$next_link = get_permalink( $next_ID );
		$next_thumb = get_the_post_thumbnail( $next_ID, 'prev-next-thumb' );
	?>

		<div id="next-post" onClick="location.href='<?php echo $next_link; ?>'" class="prev-next">
			<div class="arrow">
				<i class="fa fa-chevron-right"></i>
			</div>
			<div class="media">
				<?php if ($next_thumb): ?>
					<div class="media-left">
						<a href="<?php echo $next_link; ?>">
							<?php echo $next_thumb; ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="media-body">
					<div class="media-heading">Next</div>
					<a href="<?php echo $next_link; ?>"><?php echo $next_title; ?></a>
				</div>
			</div>
		</div>

	<?php endif; ?>

