<?php
    /*
        Template Name: Page With Background
    */
?>

<?php get_header(); ?>

<?php get_template_part( 'parts/page-hero' ); ?>
<?php
    $background_image = get_field('background_image', get_the_ID())['url'] ?? '';
?>

<div class="page-container" style="--bg-template:url(<?php print $background_image; ?>)">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>