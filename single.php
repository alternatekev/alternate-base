<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$todays_menus = array(
	'numberposts' => -1,
	'post_type' => 'menu',
	'meta_key' => 'location',
	'meta_value' => $post->ID
);
$locations_products = array(

);
$context['post'] = $post;
$context['todays_menus'] = Timber::get_posts( $todays_menus );

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
