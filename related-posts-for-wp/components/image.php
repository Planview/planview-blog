<!--<a href="<?php echo get_permalink( $related_post->ID ); ?>"><?php rp4wp_thumbnail( $related_post->ID, $parent->post_type ); ?></a>-->
<?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($related_post->ID), 'post-thumbnail' );
      $url = $thumb['0'];
?>
<a class="rp4wp-thumbnail" href="<?php echo get_permalink( $related_post->ID ); ?>" rel="bookmark" title="<?php echo the_title_attribute('echo=0'); ?>"<?php
    if ($url) {
      echo ' style="background-image: url(' . $url . ');"';
    } 
  ?>>
</a>