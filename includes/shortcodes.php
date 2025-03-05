<?php

function shortcode_address($args = array(), $content = '') {
    $location     = get_field('location', 'option');
    $location_url = get_field('location_url', 'option');

    $location_url = $location_url ? ' <a href="'.$location_url.'">(Get Directions)</a>': ''; 
    $content = strip_tags($location).$location_url;
    $content = str_ireplace("<br>", "", $content);

    if ($content) {
        return '<span>'.$content.'</span>';
    }
}
add_shortcode( 'address', 'shortcode_address' );


function shortcode_trading_hours($args = array(), $content = '') {
    $trading_hours = get_field('trading_hours', 'option');

    $content = wp_strip_all_tags($trading_hours);
    $content = str_ireplace("&nbsp;", '<br class="spacing block md:hidden">', $content);

    if ($content) {
        return '<span>'.$content.'</span>';
    }
}
add_shortcode( 'trading-hours', 'shortcode_trading_hours' );


function shortcode_phone($args = array(), $content = '') {
    $phone   = get_field('phone', 'option');

    if ($phone) {
        return '<span class="telephone"><a href="tel:+"'.$phone.'">'.$phone.'</a></span>';
    }
}
add_shortcode( 'phone', 'shortcode_phone' );

function shortcode_email($args = array(), $content = '') {
    $email   = get_field('email', 'option');

    if ($email) {
        return '<span><a href="mailto:+"'.$email.'">'.$email.'</a></span>';
    }
}
add_shortcode( 'email', 'shortcode_email' );

function shortcode_button($args = array(), $content = '') {
    $size        = $args['size'] ?? 'medium';
    $color       = $args['color'] ?? '';
    $href        = $args['href'] ?? '';
    $title       = $args['title'] ?? '';
    $icon        = $args['icon'] ?? '';
    
    if ($icon) { 
        $icon = '<img class="ml-[10px]" src="'.assets_url('/dist/images/'.$icon.'.svg').'">';
    }

    return '<a href="'.$href.'" class="button '.$color.' '.$size.'">'.$title.$icon.'</a>';
}
add_shortcode( 'button', 'shortcode_button' );


function shortcode_indent($args = array(), $content = '') {
    return '<div class="md:ml-[120px] lg:ml-[260px] lg:pr-5">'.$content.'</div>';
}
add_shortcode( 'indent', 'shortcode_indent' );

?>
