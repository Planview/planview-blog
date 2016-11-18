<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
</div>

<?php //get_search_form(); 
/* 
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
*/
//- there are two instances of the search form on the 404 page
//- the code below (which replaces the code above) changes the ID of the second form
$secondKeywordsId = "search-keywords-content-area";  
include(locate_template('templates/searchform.php'));
?>

<p>&nbsp;</p>
