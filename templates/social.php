<?php 
	global $post;
	$url = get_permalink();
	$thumb_id = get_post_thumbnail_id($post->ID);
	$thumb_source = wp_get_attachment_image_src( $thumb_id );
	$thumb_url = $thumb_source[0];
	$title = get_the_title();
	$description = get_the_excerpt();
?>

<div id="social-share">
    Share this post:
    <?php /* echo do_shortcode('[shareaholic app="share_buttons" id="19133889" title="' . the_title() . '"]'); */ ?>
    <div class="shareaholic-canvas" data-app="share_buttons" data-app-id="19133889" data-title="<?php echo the_title(); ?>" data-link="<?php echo $url; ?>" data-image="<?php if ( has_post_thumbnail( $post->ID ) ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image; } ?>"></div>
    <?php /* Removed in lieu of Shareaholic
    <div id="social-buttons">
      <a class="social-button twitter newwindow" href="http://twitter.com/intent/tweet?text=<?php echo urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')); ?>%20<?php echo urlencode($url); ?>">
      	<i class="fa fa-twitter fa-fw"></i>
      </a>
      <a class="social-button linkedin newwindow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode($url); ?>&amp;summary=">
      	<i class="fa fa-linkedin fa-fw"></i>
      </a>
      <a class="social-button email" href="mailto:?&subject=<?php echo $title; ?>&body=<?php echo urlencode($url); ?>">
      	<i class="fa fa-envelope fa-fw"></i>
      </a>
      <a class="social-button facebook newwindow" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url); ?>">
      	<i class="fa fa-facebook fa-fw"></i>
      </a>
    </div>
    */ ?>
</div>