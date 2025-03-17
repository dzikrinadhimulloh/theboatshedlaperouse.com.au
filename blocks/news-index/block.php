<?php
/**
 * Block template file: block.php
 *
 * News Index Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-index-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-news-index';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= get_global_block_classes();
$style   = get_global_block_bg();


$page     = $_POST['page'] ?? 1;
$category = $_POST['category'] ?? 0;

$cats = get_terms( array(
    'taxonomy'   => 'category',
    'hide_empty' => false,
    'exclude'    => get_cat_ID('Uncategorized') 
));

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="<?php print $style; ?>">
    <?php print get_bg_parallax(); ?>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                <?php
                    $content    = get_blog_data($page, $category);
                    $total_page = ceil($content->found_posts/POST_PER_PAGE);  
                ?>
                <div class="grid grid-cols-12 lg:gap-x-[70px] blog-index-container" data-current-page="<?php print $page; ?>" data-cat="<?php print $category ?>" data-total-page="<?php print $total_page?>"> 
                    <div class="col-span-12 md:col-span-8 lg:col-span-9 order-2 md:order-1">
                        <div class="blog-item-container">
                            <?php 
                                get_template_part( 'parts/blog-loop-item', null, [
                                    'data' => $content->posts        
                                ] )
                            ?>
                        </div>
                        <div class="blog-index-paging">
                            <?php 
                                get_template_part( 'parts/blog-paging', null, [
                                    'total_page' => $total_page,
                                    'page'       => $page
                                ] );
                            ?>
                        </div>                        
                    </div>
                    <div class="col-span-12 md:col-span-4 md:col-start-9 lg:col-span-3 lg:col-start-10 md:pl-5 lg:pl-0 text-black order-1 md:order-2 mb-10 md:mb-0">
                        <h6 class="pb-[15px] mb-4 border-b border-[#aaaaaa]">Category</h6>
                        <?php if ($cats): ?>
                            <?php foreach ($cats as $cat): ?>
                                <a href="#filter-cat" data-cat-id="<?php print $cat->term_id; ?>" class="item-cat block mb-[10px] last:mb-0">
                                    <p class="p2"><?php print $cat->name; ?></p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <h6 class="mt-10 md:mt-[70px] pb-[15px] mb-4 border-b border-[#aaaaaa]">Recent Posts</h6>
                        <?php if ($content->posts): ?>
                            <?php foreach ($content->posts as $item): ?>
                                <a href="<?php print get_permalink( $item->ID ); ?>" class="block mb-[10px] last:mb-0">
                                    <p class="p2"><?php print $item->post_title; ?></p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>