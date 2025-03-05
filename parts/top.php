<?php
    $booking_url = get_field('booking_url', 'option');
?>

<header class="headroom fixed top-0 left-0 right-0 flex items-center justify-between py-5 px-[30px]">
    <div class="basis-1/3 menu order-3 lg:order-1 text-right lg:text-left">
        <a href="#open-menu" class="btn-menu inline-block">
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="basis-1/3 logo lg:text-center order-1 lg:order-2">
        <a href="/" class="inline-block">  
            <?php print get_main_logo_svg(); ?>
        </a>
    </div>
    <div class="basis-1/3 buttons text-right hidden lg:block order-3">
        <?php if ($booking_url): ?>
            <a href="<?php print $booking_url; ?>?>" class="button medium btn-book mr-[10px]">Book a Table</a>
        <?php endif; ?>
        <a href="" class="button medium dark">View Menus</a>
    </div>
</header>

