<?php
class WPFeatures {

	function add_customizer_support() {
		// register support for custom background
		add_theme_support( 'custom-background' );

		// register support for custom colors
		add_action( 'customize_register', array( $this, 'customizer' ) );
	}

	function add_sidebar_support() {
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
	}

	function add_menu_support() {
		register_nav_menu( 'top-nav', __( 'Top Navigation' ) );
	}

	function add_thumbnail_support() {
		add_theme_support( 'post-thumbnails', array(
			'page',
			'post',
			'strain',
			'location',
			'edible',
			'topical',
			'concentrate',
			'brand'
		) );
	}

	function add_custom_header_support() {
		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/assets/images/header.png',
			'height'			 => '560',
			'width'			 => '960',
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'                => true,
			'random-default'         => false
		);

		add_theme_support( 'custom-header', $defaults );
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)  );
	}

  function register_jquery() {
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_jquery' ) );
  }

  function enqueue_jquery(){
    wp_enqueue_script("jquery");
  }

	function customizer( $wp_customize ) {
		$wp_customize->add_setting( 'text_color', array(
			'default' => '#FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( 'text_color', array(
			'type' 			=> 'color',
			'priority' 			=> 10, // Within the section.
			'section' 			=> 'colors', // Required, core or custom.
			'label' 			=> __( 'Text Color' ),
			'input_attrs' 		=> array(
				'class' 		=> 'text-color',
				'placeholder' 	=> __( '#FFFFFF' ),
				),
			'active_callback' 	=> 'is_front_page',
		) );

		$wp_customize->add_setting( 'accent_color', array(
			'default' 			=> '#FF00A6',
			'sanitize_callback' 	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( 'accent_color', array(
			'type' 			=> 'color',
			'priority' 			=> 11, // Within the section.
			'section' 			=> 'colors', // Required, core or custom.
			'label' 			=> __( 'Accent Color' ),
			'input_attrs' 		=> array(
				'class' 		=> 'accent-color',
				'placeholder' 	=> __( '#FF00A6' ),
				),
			'active_callback' 	=> 'is_front_page',
		) );

		$wp_customize->add_setting( 'secondary_color', array(
			'default' 			=> '#FF00A6',
			'sanitize_callback' 	=> 'sanitize_hex_color',
		) );

		$wp_customize->add_control( 'secondary_color', array(
			'type' 			=> 'color',
			'priority' 			=> 12, // Within the section.
			'section' 			=> 'colors', // Required, core or custom.
			'label' 			=> __( 'Secondary Color' ),
			'input_attrs' 		=> array(
				'class' 		=> 'secondary-color',
				'placeholder' 	=> __( '#FF00A6' ),
				),
			'active_callback' 	=> 'is_front_page',
		) );
	}

	function register_sidebars() {
		register_sidebar( array(
			'name'          => 'Primary Home Modules',
			'id'            => 'home_modules',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Secondary Home Modules',
			'id'            => 'home_secondary',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

}
