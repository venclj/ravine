<?php
function get_rocniky($data){
	$rocnik = $data->get_param('id');
	$query = [
		'numberposts' => 99999,
		'post_type' => 'rocnik'
	];
	if ($rocnik){
		$query['post__in']=[$rocnik];
	}
	$posts = get_posts($query);
	
	$data = array(
		'posts' => array(),
		'query' => $query
	);
	$i = 0;
	foreach ($posts as $post){
		$data['posts'][$i] = array(
			'id' 	=>	$post->ID,
			'title'	=>	$post->post_title,
			'date'	=>	get_field('datum', $post->ID),
			'podminky' => array(
				'teplota'	=>	get_field('teplota', $post->ID),
				'tlak'		=>	get_field('tlak', $post->ID),
				'vlhkost'	=>	get_field('vlhkost', $post->ID),
				'vitr'		=>	get_field('vitr', $post->ID),
				'json'		=>	get_field('params_json', $post->ID),
			)
		);
		$i++;
	}
	return $data;
}

function getRavineGeneral(){
    $data = array();
    $pageID = get_option('page_on_front'); // 
	$data['active'] = get_field('rav_aktivni_rocnik', $pageID);
	$data['date'] = get_field('rav_datum_zavodu', $pageID);

    return $data;
}

function ea_get_product_data( $data ) {
    $identifier = $data->get_param( 'identifier' );
    return $identifier;
}
?>