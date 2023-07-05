<?php
require_once(plugin_dir_path( __FILE__ ).'common.php');

function rav_html_get_odpocet_dni($atts = [], $content = null, $tag = ''){
	global $rav_front;
	$atts = shortcode_atts( array(
		'local' => false
	), $atts, 'rav_odpocet_dni' );

	if ($atts['local']=='true'){
		$code = '<span is="day-cnt-down" date="'.$rav_vnt->date->format('Y-m-d').'">';
	} else {
		$code = '<span is="day-cnt-down" date="'.$rav_front->date->format('Y-m-d').'">';
	}

	$code .= 'odpočet dní';
	$code .= '</span>';
	return $code;	
}

function rav_html_get_podminky_rocniku($atts = [], $content = null, $tag = ''){
	$code = '<div>';
	$code .= 'podmínky ročníku';
	$code .= '</div>';
	return $code;
}

function link_plugin_js(){
	wp_enqueue_script( 'lib.js', plugins_url( 'js/lib.js', __FILE__ ), [], true, false );
}
?>