<?php 
/*
YARPP Template: Planview Bootstrap
Author: Chad Honea
Description: A Bootstrap YARPP template.
*/
?>
<h4>Related Posts</h4>
<div class="row">
<?php 
  if (have_posts()) { 
    while (have_posts()) { 
      the_post(); 
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
      $url = $thumb['0'];
?>
  <div class="col-sm-4">
    <a class="yarpp-thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo the_title_attribute('echo=0'); ?>"<?php
        if ($url) {
          echo ' style="background-image: url(' . $url . ');"';
        } 
      ?>>
    </a>
    <p>
      <a href="<?php the_permalink() ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
      <!-- (<?php the_score(); ?>)-->
    </p>
  </div>
<?php } } else { ?>
  <div class="col-sm-12">
    <p>No related posts.</p>
  </div>
<?php } ?>
</div>