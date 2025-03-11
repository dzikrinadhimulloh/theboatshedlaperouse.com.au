<?php get_header(); ?>

<?php 
    $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
?>

<?php while (have_posts()) : the_post(); ?>
    <?php if ($thumbnail_image): ?>
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
    <?php endif; ?>
    <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>