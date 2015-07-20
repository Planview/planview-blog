<div id="author-meta">
	<?php
		$author_id = get_the_author_meta('ID');
		$bio = get_the_author_meta('description');
		$id = get_field('photo', 'user_'. $author_id );
		$twitter = get_field('twitter', 'user_'. $author_id );
		$image = wp_get_attachment_image_src( $id, 'thumbnail' );
		$imgsrc = $image[0];
	?>
	<div class="media">
	  <?php if ($id): ?>
	  <div class="media-left headshot">
		<img src="<?php echo $imgsrc; ?>" class="img-circle" />
	  </div>
	  <?php endif; ?>
	  <div class="media-body">
	    <div class="media-heading">
		    <span class="author-head">
		    	<?php if (is_single()): ?>
		    		Written By
		    	<?php elseif (is_author()): ?>
		    		Posts by
		    	<?php endif; ?>
		    </span>
		    <?php if (is_single()): ?>
		    	<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a>
		    <?php elseif (is_author()): ?>
		    	<?= get_the_author(); ?>
		    <?php endif; ?>
		</div>
	    <?php if ($bio){
	    	echo $bio; 
	    	}
	    	if ($twitter):
	    ?>
	    <a href="//twitter.com/<?php echo $twitter ?>" class="author-twitter" target="_blank">@<?php echo $twitter; ?></a>
		<?php endif; ?>
	  </div>
	</div>
</div>