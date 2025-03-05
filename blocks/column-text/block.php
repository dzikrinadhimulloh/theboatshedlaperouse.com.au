<?php
/**
 * Block template file: block.php
 *
 * Column Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'column-text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-column-text';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$left_content  = get_field('left_content'); 
$right_content = get_field('right_content');

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php print $style; ?>">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-start-1 lg:col-span-5 mb-[60px] lg:mb-0">
                        <?php print apply_filters( 'the_content', $left_content ); ?>                    
                    </div>
                    <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-8">
                        <?php print apply_filters( 'the_content', $right_content ); ?>                    
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>