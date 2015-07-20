<?php 
	$args = array(    
		'orderby' => 'name',
		'order' => 'ASC',
		'exclude' => '1',
	);
	$categories = get_categories($args);  //use the above parameters for all the categories
	foreach($categories as $category): 
		$caturl = get_category_link( $category->term_id );
		$title = $category->name;
		$description = $category->category_description;
		$id = get_field('category_image', $category);
		$image = wp_get_attachment_image_src( $id, 'medium' );
		$imgsrc = $image[0];
?>
<div class="category-listing row">
	<figure class="col-sm-4">
		<a href="<?php echo $caturl; ?>" alt="<?php echo $title; ?> on Planview Blog"><img src="<?php echo $imgsrc; ?>" alt="<?php echo $title; ?> on Planview Blog" class="img-responsive" /></a>
	</figure>

	<article class="col-sm-8">
		<h2><a href="<?php echo $caturl; ?>" alt="<?php echo $title; ?> on Planview Blog"><?php echo $title; ?></a></h2>
		<p><?php echo $description; ?></p>
	</article>
</div>

<?php endforeach; ?>