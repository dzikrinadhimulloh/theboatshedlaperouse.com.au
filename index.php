<?php get_header(); ?>

<?php 
    $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
?>

<?php while (have_posts()) : the_post(); ?>
    <?php if ($thumbnail_image): ?>
        <div class="relative hero bg-cover w-full min-h-[720px] md:min-h-[1024px] lg:aspect-[18/13] bg-black/40 bg-blend-multiply" style="background-image:url(<?php print $thumbnail_image?>)">
            
            <div class="absolute top-1/2 -translate-y-2/4 text-center right-0 left-0 text-section">
                <h1 class="max-w-[80%] lg:max-w-[960px] mx-auto text-white"><?php the_title(); ?></h1>
                <?php if (is_front_page()): ?>
                    <?php
                        $booking_url = get_field('booking_url', 'option');
                    ?>
                    <div class="mt-10 md:mt-20 flex flex-col md:flex-row justify-center">
                        <span class="mb-[10px] md:mb-0 md:mr-[10px]">
                            <?php print do_shortcode( '[button size="large" href="'.$booking_url.'" title="Book a Table" icon="arrow-right"]' ); ?>
                        </span>
                        <span>
                            <?php print do_shortcode( '[button size="large" color="dark" href="" title="View Menus" icon="arrow-right-white"]' ); ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>