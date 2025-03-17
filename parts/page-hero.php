
<?php 
    $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
?>

<?php if ($thumbnail_image && (!is_single())): ?>
    <section class="relative hero bg-cover bg-center w-full overflow-hidden min-h-[720px] md:min-h-[1024px] lg:min-h-fit bg-black/40 bg-blend-multiply <?php print is_front_page() ? 'lg:aspect-[18/13]' : 'lg:aspect-[36/19]'; ?>" style="background-image:url(<?php print $thumbnail_image?>)">
        <!-- <div class="top-parallax bg-black/40 bg-blend-multiply"></div> -->
        <div data-speed="2" class="animate-speed absolute text-center right-0 left-0 text-section <?php print is_front_page() ? 'top-1/2 -translate-y-2/4' : 'bottom-[100px] md:bottom-[140px]'; ?>">
            <h1 class="max-w-[90%] md:max-w-[80%] lg:max-w-[960px] mx-auto text-white"><?php print get_the_post_thumbnail_caption( get_the_ID() ); ?></h1>
            <?php if (is_front_page()): ?>
                <?php
                    $booking_url = get_field('booking_url', 'option');
                ?>
                <div class="mt-10 md:mt-20 flex flex-col md:flex-row justify-center">
                    <span class="mb-[10px] md:mb-0 md:mr-[10px]">
                        <?php print do_shortcode( '[button size="large" class="no-border" href="'.$booking_url.'" title="Book a Table" icon="arrow-right" target="_blank"]' ); ?>
                    </span>
                    <span>
                        <?php print do_shortcode( '[button size="large" color="dark" href="#open-menu-links" title="View Menus" icon="arrow-right-white"]' ); ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <section class="bg-[#F8F8F8] pt-[120px] pb-[60px] mt-[var(--header-height)]">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3">
                    <?php if (is_single()): ?>
                        <div class="flex justify-between flex-col md:flex-row text-black items-baseline ">
                            <div class="left flex justify-between w-full md:w-fit">
                                <?php
                                    $terms = wp_get_post_terms( get_the_id(), 'category' );
                                    $terms_text = wp_list_pluck( $terms, 'name' );
                                    $terms_text = implode(', ', $terms_text)
                                ?>
                                <a class="btn-text-2 mr-[30px] font-bold" href="<?php print home_url( '/news-index' )?>">← Back</a>
                                <p class="btn-text-2 mr-[30px]" ><?php print $terms_text; ?></p>
                                <p class="btn-text-2 text-black"><?php print get_the_date( 'd M Y', $item ); ?></p>
                            </div>
                            <div class="right flex">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php print get_permalink( get_the_ID() ); ?>" target="_blank" class=" mr-[30px]">
                                    <img src="<?php print assets_url('/dist/images/icon-facebook.svg')?>" alt="Facebook">
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?url=<?php print get_permalink( get_the_ID() ); ?>" target="_blank">
                                    <img src="<?php print assets_url('/dist/images/icon-linkedin.svg')?>" alt="Linkedin">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h2 class="mt-10 mb-0 ">
                        <?php the_title(); ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>