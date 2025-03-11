<?php
/**
 * Block template file: block.php
 *
 * Text Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-image-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-text-image';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$content = get_field('content');

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3">
                <?php if ($content): ?>
                    <?php foreach ($content as $item): ?>
                        <div class="item flex flex-col md:flex-row mb-20 md:mb-[100px] lg:mb-[120px] last:mb-0 md:even:flex-row-reverse md:gap-x-12 lg:gap-x-20 items-center">
                            <div class="basis-full md:basis-1/2 mb-10 md:mb-0">
                                <img src="<?php print $item['image']['url'] ?>" alt="<?php print get_alt_text($item['image']); ?>" item-fade-animate>
                            </div>
                            <div class="basis-full md:basis-1/2" item-fade-animate>
                                <h2 class="mb-5"><?php print $item['title']; ?></h2>
                                <div class="text-black">
                                    <?php print apply_filters('the_content', $item['text']); ?>
                                    <?php if ($item['cta']): ?>
                                        <?php print do_shortcode( '[button size="large text" color="" href="'.$item['cta']['url'].'" title="'.$item['cta']['title'].'" icon="arrow-right-black"]' ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div> 
</section>