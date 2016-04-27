<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php if(get_field('subtitle')): ?>
        <h2><?php the_field('subtitle'); ?></h2>
      <?php endif; ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          the_post_thumbnail('featured', array( 'class' => 'featured' ));
        } 
      ?>
      <?php the_content(); ?>
      <div class="row">
        <div class="col-sm-6">
          <?php get_template_part('templates/social'); ?>
        </div>
        <div class="col-sm-6">
          <?php get_template_part('templates/subscribe'); ?>
        </div>
      </div>
      <?php related_posts(); ?>
      <?php get_template_part('templates/tags'); ?>
    </div>
    <?php get_template_part('templates/author-meta'); ?>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
  <?php get_template_part('templates/post-nav'); ?>
<?php endwhile; ?>
