<?php
define( 'POST_PER_PAGE', 4);

/**
 * Add theme support
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_editor_style('dist/editor.css');

    register_nav_menus([
        'main_navigation' => __('Main Navigation'),
    ]);

    // Add ACF options page
    /*
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Global Options',
            'menu_slug' => 'global-options',
        ]);
    }*/
});

/**
 * Enqueue script and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('headroom-js', 'https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js', array(), null, true);
    wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
    wp_enqueue_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), null, true);
    wp_enqueue_script('masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), null, true);
    wp_enqueue_style('swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
    

    wp_enqueue_style('app', assets_url('/dist/app.css'), [], null);
    wp_enqueue_script('app', assets_url('/dist/app.js'), ['jquery'], null, true);

    // Register script for blocks
    // If needed, separate the script per block
    wp_register_script('blocks/slider', assets_url('/dist/blocks/slider.js'), ['jquery'], null, true);
});

function get_main_logo_svg(){
    $main_logo = get_field('main_logo', 'option');

    return $main_logo ? fetch_url($main_logo['url']) : '';
}

function get_secondary_logo_svg(){
    $secondary_logo = get_field('secondary_logo', 'option');

    return $secondary_logo ? fetch_url($secondary_logo['url']) : '';
}

function fetch_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function get_alt_text($img) {
    $alt_text = $img['alt'];
    $alt_text = trim($alt_text) !== '' ? $alt_text : $img['title']; 
    return $alt_text;
}

function get_blog_thumb_alt_text($post) {
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $alt_text = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true );
    return $alt_text ? $alt_text : $post->post_title; 
}

add_filter('mce_buttons_2', 'mce_buttons_2');
function mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'tiny_mce_before_init');
function tiny_mce_before_init($settings) {
    $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';

    $style_formats = array(
        array('title' => 'P2', 'inline' => 'span', 'classes' => 'p2'),
        array('title' => 'P3', 'inline' => 'span', 'classes' => 'p3'),
        array('title' => 'Button Text Size 1', 'inline' => 'span', 'classes' => 'btn-text-1'),
        array('title' => 'Button Text Size 2', 'inline' => 'span', 'classes' => 'btn-text-2'),
        array('title' => 'Button Text Size 3', 'inline' => 'span', 'classes' => 'btn-text-3'),
    );
 
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}


function get_blog_data($page = 1, $category = 0) {
    $args = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'posts_per_page' => POST_PER_PAGE,
        'paged'         => $page,
        'orderby'       => 'date',
        'order'         => 'DESC'
    );

    if ($category > 0) {
        $args['tax_query'][] = [
            'taxonomy'  => 'category',
            'terms'     => $category,
            'field'     => 'term_id',
        ];
    }

    return new WP_Query($args);
}