<?php

  // REGISTRO DE ESTILOS

  function register_enqueue_style() {
  		$theme_data = wp_get_theme();

  		/* Registrando estilos */
  		wp_register_style('bootstrap-min', get_parent_theme_file_uri('/assets/vendor/bootstrap/css/bootstrap.min.css'), null, '1.0.0', 'screen');
  		wp_register_style('fontawesome', get_parent_theme_file_uri('/assets/vendor/fontawesome-free/css/all.min.css'), null, '1.0.0', 'screen');
  		wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900');
  		wp_register_style('main', get_parent_theme_file_uri('/assets/css/resume.css'), null, '1.0.0', 'screen');

  		/* Enqueue estilos */
  		wp_enqueue_style('bootstrap-min');
  		wp_enqueue_style('fontawesome');
  		wp_enqueue_style('googleFonts');
  		wp_enqueue_style('main');
	}

	add_action( 'wp_enqueue_scripts', 'register_enqueue_style' );

  // REGISTRO DE SCRIPTS

  function register_enqueue_scripts() {
		$theme_data = wp_get_theme();

		/* Deregister Scripts */
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );

		/* Registrando Scripts */
        wp_register_script('jquery_min', get_parent_theme_file_uri('/assets/vendor/jquery/jquery.min.js'), null, null, true);
		wp_register_script('bootstrap', get_parent_theme_file_uri('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'), array('jquery_min'), null, true);
		wp_register_script('jquery_easing', get_parent_theme_file_uri('/assets/vendor/jquery-easing/jquery.easing.min.js'), array('jquery_min'), null, true);
		wp_register_script('mainJS', get_parent_theme_file_uri('assets/js/resume.min.js'), array('jquery_min'), null, true);

		/* Enqueue Scripts */
        wp_enqueue_script('jquery_min');
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('jquery_easing');
		wp_enqueue_script('mainJS');
	}

	add_action( 'wp_enqueue_scripts', 'register_enqueue_scripts' );

// logo personalizado
  function config_custom_logo() {
    add_theme_support( 'custom-logo', array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    ));
  }
  add_action( 'after_setup_theme', 'config_custom_logo' ); //after_setup_theme configuración basica al inicio del tema

  // tamaño personalizado de imágenes
    function thumbnails_setup() {
      add_theme_support( 'post-thumbnails' );
    }
    function dl_image_sizes( $sizes ) {
      $add_sizes = array(
        'portfolio-home'		=> __( 'Tamaño de las imágenes del portafolio en el home' ),
        'square'				=> __( 'Tamaño personalizado para hacer cuadradas las imágenes' ),
        'post-custom-size'	=> __( 'Tamaño personalizado para la imagen destada de los post' ),
        'custom-size-blog'	=> __( 'Tamaño personalizado para la imagen destada de los post' )
      );
      return array_merge( $sizes, $add_sizes );
    }
    if ( function_exists( 'add_theme_support' ) ) {
      add_image_size( 'portfolio-home', 465, 250, true );
      add_image_size( 'square', 400, 400, true );
      add_image_size( 'post-custom-size', 800, 600, true );
      add_image_size( 'custom-size-blog', 400, 300, true );
      add_filter( 'image_size_names_choose', 'dl_image_sizes' );
    }
    add_action( 'after_setup_theme', 'thumbnails_setup' );

    // menú personalizado
    function menus_setup() {
    	register_nav_menus(
    		array(
    			'header-menu'	=> __( 'Header Menu' ),
    			'footer-menu'	=> __( 'Footer Menu' ),
    		)
    	);
    }
    add_action( 'after_setup_theme', 'menus_setup' );



?>
