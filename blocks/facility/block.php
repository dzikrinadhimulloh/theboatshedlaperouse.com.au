<?php
/**
 * Block template file: block.php
 *
 * Facility Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'facility-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-facility';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$facility  = get_field('facility', 'option'); 

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12 text-center">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3 flex flex-wrap justify-center md:justify-between gap-y-10 md:gap-y-0">
                <?php if ($facility): ?>
                    <?php foreach ($facility as $key => $value): ?>
                        <div class="item text-center basis-1/3 md:basis-1/5" item-fade-animate>
                            <img src="<?php print $value['icon']['url']; ?>" alt="<?php print htmlspecialchars($value['title']); ?>" class="h-[60px] mx-auto">
                            <p class="p2 mt-5"><?php print $value['title']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div> 
</section>