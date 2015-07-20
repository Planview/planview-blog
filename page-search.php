<?php while (have_posts()) : the_post(); ?>
	<div id="search-form">
		<?php get_search_form(); ?>
	</div>
<?php endwhile; ?>