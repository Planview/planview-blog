<?php 
	if ( has_post_thumbnail() ) {
		$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured' );
		$src= $bg_img[0];
	}
	else {
		$src = get_template_directory_uri().'/assets/images/placeholder.jpg';
	}
	if ($count == 1) {
		$colclass = 'col-sm-8';
	}
	else {
		$colclass= 'col-sm-4';
	}
	$categories = get_the_category();
	$currentcat = get_query_var( 'cat');
?>

<div class="post-tile <?php echo $colclass; ?>">
	<article <?php post_class(); ?> style="background-image:url('<?php echo $src; ?>')" onClick="location.href='<?php the_permalink(); ?>'">
	  <div class="caption">
	  	<header>
	  	  <h2 class="entry-title"><?php the_title(); ?></h2>
	  	  <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
	  	</header>
	  	<div class="entry-summary">
	  	  <?php the_excerpt(); ?>
	  	</div>
	  </div>
	  <div class="category-list">
	  	<?php foreach ($categories as $cat) :
			$catname = $cat->cat_name;
			$catid = $cat->term_id;
			$catlink = get_category_link( $catid );
			$color = get_field('cat_color', $cat);
			$textcolor = get_field('category_text_color', $cat);
		?>
			<?php if ($catid != $currentcat): ?>
				<div class="cat-label">
					<a href="<?php echo $catlink; ?>" class="label label-primary" style="background-color:rgb(<?php echo $color ?>); color: <?php echo $textcolor; ?>;">
						<?php echo $catname; ?>
					</a>
				</div>
			<?php endif; ?>
		<?php endforeach ?>
	  </div>
	</article>
</div>

<?php if ($count == 5) : ?>
	<div class="clearfix"></div>
<?php endif ?>