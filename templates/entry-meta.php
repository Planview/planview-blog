<div class="entry-meta">
	<?php
		$author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
		$id = get_field('photo', 'user_'. $author_id );
		$image = wp_get_attachment_image_src( $id, 'thumbnail' );
		$imgsrc = $image[0];
	?>
	<span class="meta-text">
		Published <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time> 
		<span class="byline author vcard"><?= __('By', 'sage'); ?> 
			<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" title="<? echo $author_name; ?>" class="fn"><? echo $author_name; ?></a>
		</span>
	</span>
	<?php if ($id): ?>
		<span class="headshot">
			<img src="<?php echo $imgsrc; ?>" class="img-responsive" alt="<? echo $author_name; ?>" title="<? echo $author_name; ?>" />
		</span>
	<?php endif; ?>
</div>