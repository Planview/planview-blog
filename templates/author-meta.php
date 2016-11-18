<div id="author-meta">
	<?php
		$author_id = get_the_author_meta('ID');
		$author_name = get_the_author();
		$bio = get_the_author_meta('description');
		$id = get_field('photo', 'user_'. $author_id );
		$twitter = get_field('twitter', 'user_'. $author_id );
		$image = wp_get_attachment_image_src( $id, 'thumbnail' );
		$imgsrc = $image[0];
	?>
	<div class="media">
	  <?php if ($id): ?>
	  <div class="media-left headshot">
		<img src="<?php echo $imgsrc; ?>" class="img-circle" alt="<? echo $author_name; ?>" title="<? echo $author_name; ?>" />
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
		    	<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><? echo $author_name; ?></a>
		    <?php elseif (is_author()): ?>
		    	<?= get_the_author(); ?>
		    <?php endif; ?>
		</div>
	    <?php if ($bio){
	    	echo $bio; 
	    	}
	    	if ($twitter):
	    ?>
	    <a href="//twitter.com/<?php echo $twitter ?>" class="author-twitter" title="Folllow <? echo $author_name; ?> on Twitter" target="_blank">@<?php echo $twitter; ?><span class="sr-only"> (<? echo $author_name; ?> on Twitter)</span></a>
		<?php endif; ?>
	  </div>
	</div>
</div>