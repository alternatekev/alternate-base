<?php

class CustomizerScss {
	var $customizations_from_wp;
	var $scss_file;
	var $customizations_to_scss;

	function __construct() {
		$this->add_wp_actions();
	}

	function generate_new_scss(){
		$this->scss_file = get_template_directory() . '/assets/scss/_wp_customizations.scss';
		$file = fopen( $this->scss_file, 'w' );
		fwrite( $file, $this->translate_customizations_to_scss() );
		fclose( $file );
		wp_scss_needs_compiling();
	}

	function translate_customizations_to_scss(){
		$template = include( 'customizer-scss-template.php' );
		return $template;
	}

	function add_wp_actions(){
		//add_action( 'wp_head', array( $this, 'generate_new_scss' ), 100 );
		add_action( 'customize_save_after', array( $this, 'generate_new_scss' ), 100 );
		add_action( 'acf/save_post', array( $this, 'generate_new_scss' ), 1);
	}
}
