<?php while (have_posts()) : the_post(); ?>
	<div id="search-form-content-area">
		<?php //get_search_form(); ?>
    <?php
    //- there are two instances of the search form on the /search/ page
    //- the code below (which replaces the code above) changes the ID of the second form
    $secondKeywordsId = "search-keywords-content-area";  
    include(locate_template('templates/searchform.php'));
    ?>	
	</div>
<?php endwhile; ?>
