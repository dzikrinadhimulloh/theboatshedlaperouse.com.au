<?php
/**
 * Block template file: block.php
 *
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-contact';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 md:col-start-1 md:col-span-5 mb-[80px] lg:mb-0" item-fade-animate>
                        <h2>Contact</h2>
                        <?php get_template_part( 'parts/contact' ); ?>
                    </div>
                    <div class="col-span-12 md:col-span-5 md:col-start-8" item-fade-animate>
                        <h2>Trading Hours</h2>
                        <?php print do_shortcode( '[trading-hours type="2"]' )?>                   
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>