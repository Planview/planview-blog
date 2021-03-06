<footer class="content-info row">
<div class="container">
<?php dynamic_sidebar('sidebar-footer'); ?>
    <div class="col-sm-4 footer-favorite-blogs">
        <h3>Our Favorite Blogs:</h3>
        <ul id="copyright" class="list-inline">
            <li><h4><a href="http://blog.projectplace.com/" title="Projectplace's Project Collaboration Blog - Project Lab" target="_blank">Project Lab</a></h4></li>
            <li><h4><a href="http://blog.innotas.com/" title="The Innotas Company Blog" target="_blank">Innotas Blog</a></h4></li>
        </ul>
    </div>
    <div class="col-sm-4 footer-logo-area">
    	<a href="http://www.planview.com/" target="_blank"><img src="<?= get_template_directory_uri(); ?>/assets/images/planview-white.png" alt="Planview" width="150" height="35" class="footer-logo-area-img" /></a>
    </div>
    <div class="col-sm-4 footer-copyright-links">
    	<p class="footer-copyright-links-p"><a href="http://www.planview.com/legal/privacy-statement/" target="_blank" class="footer-copyright-links-privacy">Privacy</a>
    	<a href="http://www.planview.com/legal/" target="_blank">Legal Terms</a><br />
        &copy; Copyright <?php echo date('Y'); ?> <a href="http://www.planview.com/" target="_blank" style="color:#FFF;">Planview, Inc.</a>, All Rights Reserved.</p>
    </div>
</div>
</footer>