<?php 
  $page = get_page_by_title( 'Subscribe' );
  $title = apply_filters( 'the_title', $page->post_title );
  $content = apply_filters( 'the_content', $page->post_content );
?>

<!-- Subscribe Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
        <h4 class="modal-title" id="ModalLabel"><?php echo $title; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
</div>