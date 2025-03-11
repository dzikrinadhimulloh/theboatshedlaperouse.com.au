<?php
/**
 * Block template file: block.php
 *
 * Faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-faq';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$classes   .= get_global_block_classes();
$style      = get_global_block_bg();
$contents   = get_field('contents');
$title      = get_field('title');


?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> overflow-hidden" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12" item-fade-animate>
            <div class="col-span-12 md:col-start-2 md:col-span-10 xl:col-start-3 xl:col-span-8">
                <?php if ($title) : ?>
                    <h2 class="mb-6 md:mb-10"><?php print $title; ?></h2>
                <?php endif; ?>
                <?php if ($contents) : ?>
                    <div class="custom-accordion">
                        <?php foreach($contents as $key => $val) : ?>
                            <div class="accordion-item relative p-4 md:py-5 md:px-[30px] rounded-xl overflow-hidden last-of-type:mb-0 mb-[10px] bg-gray">
                                <div class="accordion-title cursor-pointer flex items-center justify-between">
                                    <p class="text-black font-medium"><?php print $val['title']; ?></p>
                                    <i class="icon"></i>
                                </div>
                                <div class="accordion-content mt-0 h-0 transition-all duration-500 overflow-hidden text-black">
                                    <?php print apply_filters( 'the_content', $val['text'] ); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>