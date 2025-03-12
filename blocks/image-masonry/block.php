<?php
/**
 * Block template file: block.php
 *
 * Image Masonry Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-masonry-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-masonry';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$content = get_field('content');
$start_from = get_field('start_from');

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                <div class="flex justify-center">
                    <div class="grid-masonry flex flex-wrap w-full lg:w-[80%] m-auto max-w-[1080px] <?php print $start_from; ?>">
                        <?php foreach ($content as $item): ?>
                            <div class="grid-item w-full md:w-[48%] mb-[20px] xl:mb-[30px]" item-fade-animate>
                                <img src="<?php print $item['url'] ?>" alt="<?php print get_alt_text($item); ?>" class="w-full lg:w-auto">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>