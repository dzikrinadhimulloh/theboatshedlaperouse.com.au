<?php
/**
 * Block template file: block.php
 *
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-slider';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$type    = get_field('type');
$images  = get_field('images');

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> overflow-hidden" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3">
                <?php if ($images): ?>
                    <div class="swiper overflow-visible <?php print $type; ?>">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $item): ?>
                                <div class="swiper-slide mr-5 last:mr-0 aspect-[11/16] <?php print $type == 'large' ? 'w-[300px] md:w-[400px] lg:w-[440px] ' : 'w-[300px] md:w-[357px]'; ?>">
                                    <img src="<?php print $item['url']; ?>" alt="<?php print $item['alt_text']; ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                <?php endif; ?>    
            </div>
        </div>
    </div> 
</div>