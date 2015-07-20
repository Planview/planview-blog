<?php the_content(); ?>

<?php if(is_page('about')): ?>

	<?php get_template_part('templates/category', 'list'); ?>

<?php endif; ?>