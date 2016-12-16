<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a href="http://www.planview.com/" target="_blank"><i class="fa fa-arrow-left"></i>  Planview.com</a>
  </div>
</nav>

<header class="banner navbar navbar-default navbar-static-top">
  <div class="container">

    <?php
      if (is_search()):
        $collapseclass="collapse in";
        $toggleclass="active";
      else:
        $collapseclass="collapse";
        $toggleclass="";
      endif; 
    ?>
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><?php bloginfo('name'); ?></a>
      <div class="tagline"><?php bloginfo('description'); ?></div>
    </div>

    <nav class="collapse navbar-collapse" id="mainnav">
      
      <ul class="nav navbar-nav icons">
        <li class="menu-item"><a title="About Planview Blog" href="/about/"><i class="fa fa-info-circle"></i></a></li>
        <li class="menu-item hidden-xs"><a id="search-toggle" class="<?php echo $toggleclass; ?>" title="Search Planview Blog" data-toggle="collapse" href="#search-form" aria-expanded="false" aria-controls="search-form"><i class="fa fa-search"></i></a></li>
        <li class="menu-item visible-xs searchlink"><a title="Search Planview Blog" href="/search/"><i class="fa fa-search"></i></a></li>
      </ul>

      <?php
      if (has_nav_menu('primary_navigation_right')) :
        wp_nav_menu(['theme_location' => 'primary_navigation_right', 'menu_class' => 'nav navbar-nav navbar-right icons']);
      endif;
      ?>

      <ul class="nav navbar-nav navbar-right icons">
        <li class="menu-item menu-subscribe"><a href="#subscribeModal" title="Subscribe" data-toggle="modal" data-target="#subscribeModal"><i class="fa fa-envelope-square"></i>  <span>Subscribe</span></a></li>
      </ul>

      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>     

    </nav>
    
    <div id="search-form" class="<?php echo $collapseclass; ?>">
      <?php get_search_form(); ?>
    </div>

  </div>
</header>

<?php get_template_part('templates/subscribe-modal'); ?>
