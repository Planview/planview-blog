<?php if (!is_home()) : ?>
	<?php get_template_part('templates/page', 'header'); ?>
<?php endif; ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
<?php endif; ?>
<?php $count=0; ?>
<?php while (have_posts()) : the_post(); $count++ ?>
	
	<?php set_query_var( 'count', $count ); ?>

	<?php if ( (is_home() || is_category()) && !is_paged() && $count<=5 ) : ?>	
	
		<?php get_template_part('templates/content', 'tile', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
	
	<?php else : ?>

  		<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

  	<?php endif; ?>

<?php endwhile; ?>

<?php get_template_part('templates/pagination'); ?>