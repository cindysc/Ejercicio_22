<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head() ?>
  </head>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Clarence Taylor</span>
      <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php if ( has_nav_menu( 'header-menu' ) ) { ?>
    	<?php wp_nav_menu( array(
    		'theme_location' 	=> 'header-menu',  //nombre del menu indicado en function.php
    		'container_id'		=> 'navbarResponsive',  //id para el div que se crea
    		'container_class' 	=> 'collapse navbar-collapse',
    		'menu_class'     	=> 'navbar-nav ml-auto'  //clases para el <ul>
    		)
    	); ?>
        <?php } ?>

    </div>
  </nav>
  <?php
    if ( current_user_can( 'administrator' ) ) {
      echo '<div style="text-align: center">Eres el administrador</div>';
    } else {
      echo '<div style="text-align: center">Hola Muggle</div>';
    }
  ?>
