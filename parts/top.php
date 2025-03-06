<?php
    $main_nav    = wp_get_nav_menu_items( 'Main Nav' );
    $booking_url = get_field('booking_url', 'option');
?>  

<header class="headroom fixed top-0 left-0 right-0 flex items-center justify-between py-[13px] md:py-5 px-5 md:px-[30px]">
    <div class="basis-1/3 menu order-3 lg:order-1 text-right lg:text-left">
        <a href="#open-menu" class="btn-menu inline-block">
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="basis-1/3 logo lg:text-center order-1 lg:order-2">
        <a href="<?php print home_url()?>" class="inline-block">  
            <?php print get_main_logo_svg(); ?>
        </a>
    </div>
    <div class="basis-1/3 buttons text-right hidden lg:block order-3">
        <?php if ($booking_url): ?>
            <div class="inline-block mr-[10px]">
                <?php print do_shortcode( '[button size="medium btn-book" href="'.$booking_url.'" title="Book a Table"]' ); ?>
            </div>
        <?php endif; ?>
        <?php print do_shortcode( '[button size="medium" color="dark" href="#" title="View Menus" ]' ); ?>
    </div>
</header>

<div class="menu-panel bg-white fixed top-0 left-0 right-0 bottom-0 z-[-1] transition-all duration-300 opacity-0 flex flex-col justify-between">
    <div class="flex items-center justify-between py-[13px] md:py-5 px-5 md:px-[30px] h-[86px] md:h-[122px] top-container">
        <div class="basis-2/4 menu order-2 lg:order-1 text-right lg:text-left">
            <a href="#open-menu" class="btn-menu inline-block h-[50px] content-center">
                <span></span>
                <span></span>
            </a>
        </div>
        <div class="basis-2/4 buttons lg:text-right order-1 lg:order-2">
            <?php if ($booking_url): ?>
                <?php print do_shortcode( '[button size="medium btn-book" color="dark" href="'.$booking_url.'" title="Book a Table"]' ); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container flex pb-[75px] md:pb-[80px] lg:pb-[90px] flex-col lg:flex-row">
        <div class="lg:basis-[65%] xl:basis-[54%]">
            <?php if ($main_nav): ?>
                <div class="menu flex flex-col text-left">
                    <?php foreach ($main_nav as $nav): ?>
                        <a href="<?php print $nav->url; ?>" class="font-sans-alt mb-6 md:mb-5 last:mb-0">
                            <h1 class="hidden md:block mb-0"><?php print $nav->title; ?></h1>
                            <h3 class="block md:hidden mb-0"><?php print $nav->title; ?></h3>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="lg:basis-[35%] xl:basis-[46%] flex lg:flex-col xl:flex-row">
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
            <div class="flex flex-col xl:items-center mt-10 md:mt-20 xl:mt-0 xl:pl-10">
                <span class="mb-[10px]">
                    <?php print do_shortcode( '[button size="large" href="'.$booking_url.'" title="Book a Table" icon="arrow-right"]' ); ?>
                </span>
                <span>
                    <?php print do_shortcode( '[button size="large" color="dark" href="" title="View Menus" icon="arrow-right-white"]' ); ?>
                </span>
            </div>
        </div>
    </div>
</div>