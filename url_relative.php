<?php
/*
Plugin name: 	url relative
Plugin URI:		https://www.wpserveur.net
Description: 	Permet d'utiliser le shortcode [site_url] dans les liens pour avoir toutes les url meme des images en absolu . il permet de changer de nom de domaine sans avoir a changer toutes les url internes
Author: 		WPServeur
Author URI: 	https://www.wpserveur.net
Version: 		1.1.1
*/
defined( 'ABSPATH' ) or	die( 'Cheatin\' uh?' );

//shortcode [site_url] retourne l'url du site sans le slash
function site_url_relative() {
	return get_bloginfo( 'url' );
}
add_shortcode('site_url', 'site_url_relative');
//shortcode [site_url_slash] retourne l'url du site avec le slash
function site_url_relative_slash() {
	$slash = ('/');
	$siteurl = get_bloginfo( 'url' );
	return '' .$siteurl. '' .$slash. '';
}
add_shortcode('site_url_slash', 'site_url_relative_slash');

//shortcode pour afficher les shortcodes sans les éxecuter

function cutshortcode( $atts ) {
	extract ( shortcode_atts ( array(
		'texte' => '',
		'crochet_int' => '[',
		'crochet_ext' => ']',
	), $atts, 'cut_shortcode' ) );
	$codehtml = "$crochet_int$texte$crochet_ext";
	return $codehtml;
}
add_shortcode('cut_shortcode', 'cutshortcode');