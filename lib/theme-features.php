<?php
require_once( 'features/wp.php' );
require_once( 'features/catchfly.php' );

class ThemeFeatures extends TimberSite {

	var $wp, $catchfly;

	function __construct() {

		$this->wp = new WPFeatures();
		$this->catchfly = new CatchflyFeatures();

    $this->catchfly->enqueue_sign_in_buttons();
		$this->wp->add_customizer_support();
		$this->wp->add_sidebar_support();
		$this->wp->add_menu_support();
		$this->wp->add_thumbnail_support();
		$this->wp->add_custom_header_support();
    $this->wp->register_jquery();

		$this->add_timber_support();
		parent::__construct();

	}

	function add_timber_support() {
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
	}

	function add_to_context( $context ) {
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		$context['options'] = get_fields( 'options' );
		return $context;
	}
}
