<?php use Roots\Sage\Titles; ?>

<div class="page-header col-xs-12">
	<?php if (is_category()): ?>
		<?php
			// vars
			$category = get_queried_object();
			$id = get_field('category_image', $category);
			$bgimage = wp_get_attachment_image_src( $id, 'large' );
			$color = get_field('cat_color', $category);
			$textcolor = get_field('category_text_color', $category);
		?>
        <div id="cat-banner" class="col-xs-12" style="background-image:url(<?php echo $bgimage[0];?>);">
            <h1 style="background-color:rgb(<?php echo $color ?>); background-color:rgba(<?php echo $color ?>,.9); color: <?php echo $textcolor; ?>;">
                <?php single_cat_title(); ?>
            </h1>
        </div>
	<?php elseif (is_author()): ?>
		<?php get_template_part('templates/author-meta'); ?>
	<?php else: ?>
		<h1><?= Titles\title(); ?></h1>
	<?php endif; ?>
</div>
<div class="clearfix"></div>
