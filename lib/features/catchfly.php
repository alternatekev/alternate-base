<?php
class CatchflyFeatures {
  function enqueue_sign_in_buttons() {
    add_action( 'wp_enqueue_scripts', array( $this, 'add_sign_in_buttons' ) );
  }
  function add_sign_in_buttons(){
    echo wp_enqueue_script( 'sign-in-buttons', get_template_directory_uri() . '/assets/js/sign-in-buttons.js', array('jquery') );
  }
}
