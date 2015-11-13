<?php 
/*
function contributors() {
    global $wpdb;

    $authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");

    foreach ($authors as $author) {

        $author_id = $author->ID;
        $author_url = get_author_posts_url( $author_id );
        $bio = get_the_author_meta('description', $author_id);
        $id = get_field('photo', 'user_'. $author_id );
        $twitter = get_field('twitter', 'user_'. $author_id );
        $image = wp_get_attachment_image_src( $id, 'thumbnail' );
        $imgsrc = $image[0];
?>
<div class="author-listing row">
	<figure class="col-sm-4">
		<a href="<?php echo $author_url; ?>" alt="<?php echo $name; ?> on Planview Blog"><img src="<?php echo $imgsrc; ?>" alt="<?php echo $name; ?> on Planview Blog" class="img-responsive" /></a>
	</figure>

	<article class="col-sm-8">
		<h2><a href="<?php echo $author_url; ?>" alt="<?php echo $name; ?> on Planview Blog"><?php echo $name; ?></a></h2>
		<p><?php echo $bio; ?></p>
	</article>
</div>
<?php
    }
}
contributors();
*/

$args = array(    
    'orderby' => 'name',
    'order' => 'ASC',
    'exclude' => '1',
);

// The Query
$user_query = new WP_User_Query($args);  //use the above parameters for all the authors

// Author Loop
if ( ! empty( $user_query->results ) ) {

    foreach( $user_query->results as $author) { 

        $author_id = $author->ID;
        $name = $author->display_name;
        $author_url = get_author_posts_url( $author_id );
        $bio = get_the_author_meta('description', $author_id);
        $id = get_field('photo', 'user_'. $author_id );
        $twitter = get_field('twitter', 'user_'. $author_id );
        $featured_author = get_field('featured_author', 'user_'. $author_id );
        $image = wp_get_attachment_image_src( $id, 'thumbnail' );
        $imgsrc = $image[0];

        if ('' != $bio && '' != $imgsrc && false != $featured_author) {
?>
<div class="author-listing row">
	<figure class="col-sm-3 headshot">
		<a href="<?php echo $author_url; ?>" title="<?php echo $name; ?> on Planview Blog"><img src="<?php echo $imgsrc; ?>" alt="<?php echo $name; ?> on Planview Blog" class="img-responsive img-circle" /></a>
	</figure>

	<article class="col-sm-9">
		<h2><a href="<?php echo $author_url; ?>" title="<?php echo $name; ?> on Planview Blog"><?php echo $name; ?></a></h2>
        <?php if ($twitter): ?>
        <a href="//twitter.com/<?php echo $twitter ?>" class="author-twitter" target="_blank">@<?php echo $twitter; ?></a>
		<?php endif; ?>
		<p><?php echo $bio; ?></p>
	</article>
</div>

<?php
        }
    } // end foreach

} else {

    echo 'No authors found.';

}
?>