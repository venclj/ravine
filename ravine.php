<?php
/**
* Plugin Name: Ravine Custom API
* Plugin Uri: modranyravinerun.cz
* Version: 0.1
* Author: Josef Vencl
* Author URI: kujoni.cz
*/

include(plugin_dir_path( __FILE__ ).'common.php');
include(plugin_dir_path( __FILE__ ).'admin.php');
include(plugin_dir_path( __FILE__ ).'api.php');
include(plugin_dir_path( __FILE__ ).'html.php');
//require_once('./api.php');
//require_once('shortcodes.php');

// * 			SHORTCODES

add_shortcode('rav_odpocet_dni', 'rav_html_get_odpocet_dni');
add_shortcode('rav_podminky_rocniku', 'rav_html_get_podminky_rocniku');

add_shortcode( 'bartag', 'wpdocs_bartag_func' );
function wpdocs_bartag_func( $atts ) {
	$atts = shortcode_atts( array(
		'foo' => 'no foo',
		'baz' => 'default baz'
	), $atts, 'bartag' );

	return "foo = {$atts['foo']}";
}

// * 			API
add_action('wp_head', 'link_plugin_js');

add_action("rest_api_init", function(){

    register_rest_route( 'ravine/v1', '/general/', array(
        'methods' => "GET",
        'callback' => 'getRavineGeneral',
		'permission_callback' => '__return_true',
    ));
	register_rest_route('ravine/v1', '/rocniky/', array(
		'methods' => "GET",
		'callback' => 'get_rocniky',
		'permission_callback' => '__return_true',
	));
	register_rest_route( 'ravine/v1', '/product/', array(
      'methods' => 'GET',
      'callback' => 'ea_get_product_data',
	  'permission_callback' => '__return_true',
    ) );
});
 
// * 			ADMIN extension

add_action( 'admin_menu', 'linked_url' );
add_action( 'admin_menu' , 'linkedurl_function' );
?>