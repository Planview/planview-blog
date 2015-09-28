<?php 
/*
YARPP Template: Planview Bootstrap
Author: Chad Honea
Description: A Bootstrap YARPP template.
*/
?>
<h4>Related Posts</h4>
<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
$url = $thumb['0']; ?>
<div class="col-sm-4">
    <a class="yarpp-thumbnail" href="<?php echo get_permalink(); ?>" title="<?php echo the_title_attribute('echo=0'); ?>"><?php echo get_the_post_thumbnail( null, $dimensions['size'] ); ?></a>
    <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)--></p>
</div>
<?php } } else { ?>
<p>No related posts.</p>
<?php } ?>