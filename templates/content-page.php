<?php the_content(); ?>

<?php if(is_page('about')): ?>

	<?php get_template_part('templates/category', 'list'); ?>

<?php endif; ?>

<?php if(is_page('authors')): ?>

	<?php get_template_part('templates/author', 'list'); ?>

<?php endif; ?>