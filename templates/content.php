<div class="post-list row">
	<article <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ): 
			$articleclass = 'col-sm-10';
	  		$attr = array(
	  			'class' => "img-responsive",
	  			'alt' => "",
	  		);
	  		$size = 'post-list-thumb';
	  	?>

		<figure class="col-sm-2 hidden-xs">
			<?php the_post_thumbnail( $size, $attr ); ?>
		</figure>

	  	<?php 
			else:
		  		$articleclass = 'col-sm-12';
			endif; 
		?>
		<div class="post-content <?php echo $articleclass; ?>">
		  <header>
		    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
		  </header>
		  <div class="entry-summary">
		    <?php the_excerpt(); ?>
		  </div>
		</div>
	</article>
</div>