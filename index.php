<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part( 'parts/page-hero' ); ?>
    <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>