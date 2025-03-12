<?php

define('CUSTOM_BLOCKS', [
    'page' => [
        'text', 'column-text', 'facility', 'text-image', 'slider', 'blog-slider', 'faq', 'image-masonry', 'contact'
    ],
    'post' => [
        //'text', 'column-text', 'facility', 'text-image', 'slider'
    ],
]);

$allowed_core_blocks = [
    // Add allowed core blocks here
    'post' => [
        'core/paragraph',
        'core/freeform',
    ],
];

/**
 * Register blocks
 */
add_action('init', function () {
    $dir = get_template_directory();
    $block_list = array_unique(array_merge(...array_values(CUSTOM_BLOCKS)));

    foreach ($block_list as $block) {
        register_block_type($dir . '/blocks/' . $block);
    }
}, 5);

/**
 * Set allowed blocks
 */
add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) use ($allowed_core_blocks) {
    if ($editor_context->post) {
        $current_post_type = $editor_context->post->post_type;
        foreach (CUSTOM_BLOCKS as $post_type => $block_list) {
            if ($current_post_type == $post_type) {
                $allowed_blocks = [];
                foreach ($block_list as $block) {
                    $allowed_blocks[] = 'acf/' . $block;
                }

                if (isset($allowed_core_blocks[$post_type])) {
                    $allowed_blocks = [
                        ...$allowed_blocks,
                        ...$allowed_core_blocks[$post_type],
                    ];
                }
            }

        }
    }

    return $allowed_blocks;
}, 10, 2);


function get_global_block_classes() {
    $parallax = get_field('parallax') ?? false; 
    $overlay  = get_field('overlay') ?? false;
    $fixed    = get_field('fixed_background') ?? false;

    $classes = [];
    $classes[] = ' relative ';
    $classes[] = get_field('padding_top');
    $classes[] = get_field('padding_bottom');
    $classes[] = get_field('background_color');
    $classes[] = get_field('background_image') && !$parallax ? 'background' : '';
    $classes[] = $parallax ? 'has-parallax' : '';
    $classes[] = $overlay ? 'has-overlay' : '';
    $classes[] = $fixed ? 'has-fixed-bg' : '';
    

    return implode(' ', $classes);
}

function get_global_block_bg() {
    return ($bgImg = get_field('background_image')) ? '--bg-url:url('.$bgImg['url'].')' : ''; 
}

function get_bg_parallax() {
    $parallax = get_field('parallax') ?? false; 
    if ($parallax) {
        return '<div class="parallax-outer"><div class="parallax-bg"></div></div>';
    }
}