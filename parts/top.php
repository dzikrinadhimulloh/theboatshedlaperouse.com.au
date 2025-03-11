<?php
    $main_nav     = wp_get_nav_menu_items( 'Main Nav' );
    $booking_url  = get_field('booking_url', 'option');
    $dine_in_menu = get_field('dine_in_menu', 'option');
    $set_menu     = get_field('set_menu', 'option');
?>  

<header class="headroom fixed top-0 left-0 right-0 flex items-center justify-between py-[13px] md:py-5 px-5 md:px-[30px]">
    <div class="basis-1/3 menu order-3 lg:order-1 text-right lg:text-left">
        <a href="#open-menu" class="btn-menu inline-block" alt="Open Menu">
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="basis-1/3 logo lg:text-center order-1 lg:order-2">
        <a href="<?php print home_url()?>" class="inline-block" alt="<?php print get_bloginfo('name') ?>">  
            <?php print get_main_logo_svg(); ?>
        </a>
    </div>
    <div class="basis-1/3 buttons text-right hidden lg:block order-3">
        <?php if ($booking_url): ?>
            <div class="inline-block mr-[10px]">
                <?php print do_shortcode( '[button size="medium btn-book" href="'.$booking_url.'" title="Book a Table" target="_blank"]' ); ?>
            </div>
        <?php endif; ?>
        <?php print do_shortcode( '[button size="medium" color="dark" href="#open-menu-links" title="View Menus" ]' ); ?>
    </div>
</header>

<div class="menu-panel menu-link-panel bg-blue fixed top-0 left-0 right-0 bottom-0 z-[-1] transition-all duration-300 opacity-0 flex flex-col">
    <div class="container absolute top-0 left-0 right-0 bottom-0 w-full h-full flex flex-col items-center justify-center">
        <div class="w-[90%] md:w-[500px] flex items-center justify-center flex-col">
            <?php print get_secondary_logo_svg(); ?>
            <div class="mt-[50px] md:mt-20 mb-5 w-full">
                <?php print do_shortcode( '[button size="large" href="'.$dine_in_menu['url'].'" target="_blank" color="dark" title="Dine In Menu"]' ); ?>
            </div>
            <div class="w-full">
                <?php print do_shortcode( '[button size="large" href="'.$set_menu['url'].'" target="_blank" color="dark" title="Set Menu"]' ); ?>
            </div>
        </div>
    </div>
    <?php get_template_part( 'parts/menu-panel-header' ) ?>
</div>

<div class="menu-panel bg-white fixed top-0 left-0 right-0 bottom-0 z-[-1] transition-all duration-300 opacity-0 flex flex-col justify-between">
    <?php get_template_part( 'parts/menu-panel-header', null, ['button_color' => 'dark'] ) ?>
    <div class="mx-5 md:mx-10 lg:mx-20 flex pb-[75px] md:pb-[80px] lg:pb-[90px] flex-col lg:flex-row">
        <div class="lg:basis-[65%] xl:basis-[54%]">
            <?php if ($main_nav): ?>
                <div class="menu flex flex-col text-left">
                    <?php foreach ($main_nav as $nav): ?>
                        <a href="<?php print $nav->url; ?>" alt="<?php print $nav->title; ?>" class="font-sans-alt mb-6 md:mb-5 last:mb-0">
                            <h1 class="hidden md:block mb-0"><?php print $nav->title; ?></h1>
                            <h3 class="block md:hidden mb-0"><?php print $nav->title; ?></h3>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="lg:basis-[35%] xl:basis-[46%] flex lg:flex-col xl:flex-row xl:justify-between">
            <div class="hidden lg:block address-container">
                <div class="mb-5">
                    <p class="mb-0"><strong>Call Us</strong></p>
                    <p><?php print do_shortcode( '[phone]' )?></p>
                </div>
                <div class="mb-5">
                    <p class="mb-0"><strong>Email Us</strong></p>
                    <p><?php print do_shortcode( '[email]' )?></p>
                </div>
                <div class="">
                    <p class="mb-0"><strong>Location</strong></p>
                    <?php print do_shortcode( '[address type="2"]' )?>
                </div>
            </div>
            <div class="flex flex-col xl:items-center mt-10 md:mt-20 xl:mt-0 xl:pl-2 2xl:pl-8">
                <span class="mb-[10px]">
                    <?php print do_shortcode( '[button size="large" href="'.$booking_url.'" title="Book a Table" icon="arrow-right" target="_blank"]' ); ?>
                </span>
                <span>
                    <?php print do_shortcode( '[button size="large" color="dark" href="#open-menu-links" title="View Menus" icon="arrow-right-white"]' ); ?>
                </span>
            </div>
        </div>
    </div>
</div>