<?php
    $booking_url  = get_field('booking_url', 'option');
    $button_color = $args['button_color'] ?? ''; 
?>
<div class="flex items-center justify-between py-[13px] md:py-5 px-5 md:px-[30px] h-[86px] md:h-[122px] top-container">
    <div class="basis-2/4 menu order-2 lg:order-1 text-right lg:text-left">
        <a href="#close-menu" class="btn-menu inline-block h-[50px]">
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="basis-2/4 buttons lg:text-right order-1 lg:order-2">
        <?php if ($booking_url): ?>
            <?php print do_shortcode( '[button size="medium btn-book" color="'.$button_color.'" href="'.$booking_url.'" title="Book a Table"]' ); ?>
        <?php endif; ?>
    </div>
</div>