<?php
/**
 * Block template file: block.php
 *
 * Blog Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-blog-slider';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();
$type    = get_field('type');
$blogs   = get_field('blogs');
$title   = get_field('title');
$link    = get_field('link');

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> overflow-hidden" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 <?php print $type == 'padded' ? 'lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3' : ''; ?>">
                <?php if ($title || $link): ?>
                    <div class="flex justify-between mb-10 items-baseline">
                        <?php if ($title): ?>
                            <h2 class="mb-0"><?php print $title; ?></h2>
                        <?php endif; ?>
                        <?php if ($link): ?>
                            <a href="<?php print $link['url']; ?>">
                                <p class="p2 font-sans-alt"><?php print $link['title']; ?></p>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($blogs): ?>
                    <div class="swiper-blog overflow-visible <?php print $type; ?>">
                        <div class="swiper-wrapper">
                            <?php foreach ($blogs as $item): ?>
                                <div class="swiper-slide mr-5 last:mr-0 h-auto min-h-[450px] md:min-h-[480px] w-[300px] md:w-[320px] lg:w-[340px] flex flex-col overflow-hidden" item-fade-animate>
                                    <a href="<?php print get_permalink( $item->ID ); ?>" alt="<?php print $item->post_title; ?>">
                                        <div class="img-container overflow-hidden w-full h-[264px] md:h-[282px] lg:h-[300px]">
                                            <?php 
                                                
                                            ?>
                                            <img src="<?php print get_the_post_thumbnail_url( $item->ID ); ?>" alt="<?php print get_blog_thumb_alt_text($item); ?>" class="object-cover transition-all duration-200 hover:scale-110">
                                        </div>
                                        <div class="relative text-container grow z-10">
                                            <h4 class="text-[22px] md:text-[24px] lg:text-[26px] mb-[10px] text-blue"><?php print $item->post_title; ?></h4>
                                            <p class="p2 font-sans-alt text-dark-gray"><?php print get_the_excerpt( $item->ID ); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>    
            </div>
        </div>
    </div> 
</section>