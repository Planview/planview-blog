<?php
global $wp_query;

$big = 999999999; // need an unlikely integer

$pagination = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'prev_text' => 'newer<span class="sr-only"> blog posts</span>',
	'next_text' => 'older<span class="sr-only"> blog posts</span>',
	'mid_size' => 2,
	'type' => 'list',
	'before_page_number' => '<span class="sr-only">page </span>',
) );
?>
<div id="pagination"><?php echo $pagination ?></div>

<?php if (is_category()):
	$category = get_queried_object();
	$description = $category->category_description;
  $id = get_field('category_image', $category);
  $catimage = wp_get_attachment_image_src( $id, 'thumbnail' );
	?>
<div id="category-meta">
  <div class="media">
    <div class="media-left hidden-xs">
      <img src="<?php echo $catimage[0];?>" class="img-circle" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>" >
    </div>
    <div class="media-body">
      <h3 class="media-heading">
        <?php single_cat_title(); ?>
      </h3>
      <p><?php echo $description; ?></p>
    </div>
  </div>
</div>
<?php endif; ?>
