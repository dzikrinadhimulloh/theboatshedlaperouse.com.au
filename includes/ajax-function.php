<?php

function tbs_load_blog_directory() {
	$page     = $_POST['page'];
	$category = $_POST['category'];
	$paging_content = '';

	ob_start();
    $blogs = get_blog_data($page, $category);
    get_template_part( 'parts/blog-loop-item', null, [
        'data' => $blogs->posts        
    ] );
    $content = ob_get_contents();
	ob_end_clean();

	$total_page = ceil($blogs->found_posts/POST_PER_PAGE);

	if ($total_page > 1) { 
		ob_start();
		get_template_part( 'parts/blog-paging', null, [
			'total_page' => $total_page,
			'page'       => 1
		] );
		$paging_content = ob_get_contents();
		ob_end_clean();
	}
  
	$data = array (
		'html'  => $content,
		'html_paging' => $paging_content,
        'page'  => $page,
	);
  
	print wp_send_json( $data );
	wp_die();
}
add_action( 'wp_ajax_load_blog_directory', 'tbs_load_blog_directory' );
add_action( 'wp_ajax_nopriv_load_blog_directory', 'tbs_load_blog_directory' );


function load_blog_paging() {
	$total_page = $_POST['total_page'];
	$content    = '';

	if ($total_page > 1) { 
		ob_start();
		get_template_part( 'parts/blog-paging', null, [
			'total_page' => $total_page,
			'page'       => 1
		] );
		$content = ob_get_contents();
		ob_end_clean();
	}
	
	$data = array (
		'html'  => $content,
		'total_page' => $total_page
	);
  
	print wp_send_json( $data );
	wp_die();
}
add_action( 'wp_ajax_load_blog_paging', 'load_blog_paging' );
add_action( 'wp_ajax_nopriv_load_blog_paging', 'load_blog_paging' );

?>