<?php
if (post_password_required()) {
  return;
}
?>

<section id="comments" class="comments">
  <?php if (comments_open()) : ?>
    <h3>Discussion</h3>
    <?php
    $comments_args = array(
            // change the title of send button 
            'label_submit'=>'Submit Comment',
            // change the title of the reply section
            'title_reply'=>'',
            // remove "Text or HTML to be displayed after the set of comment fields"
            'comment_notes_after' => '',
            // redefine your own textarea (the comment body)
            'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" class="form-control" aria-required="true" rows="3" placeholder="Add your comment"></textarea></div>',
    );
    comment_form($comments_args);
    ?>

    <div class="comment-list">
      <?php wp_list_comments(['style' => 'div',
        'short_ping' => true,
        'avatar_size' => 50,
        ]); 
      ?>
    </div>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'sage'); ?>
    </div>
  <?php endif; ?>
</section>
