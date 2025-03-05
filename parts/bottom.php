<?php
    $main_nav       = wp_get_nav_menu_items( 'Main Nav' );
    $footer_text    = get_field('footer_text', 'option');
    $social_links   = get_field('social_links', 'option');
    $bottom_button_links = get_field('bottom_button_links', 'option');
?>
<footer class="relative bg-navy text-metal pt-[60px] pb-10">
    <div class="container">
        <div class="grid max-w-[1266px] mx-auto">
            <div class="top-container flex flex-col lg:flex-row items-center justify-between mb-10 md:mb-[70px]">
                <div class="logo">
                    <a href="/" class="mb-10 lg:mb-0 block">
                        <?php print get_main_logo_svg(); ?>
                    </a>
                </div>
                <?php if ($main_nav): ?>
                    <div class="menu flex flex-col md:flex-row text-center">
                        <?php foreach ($main_nav as $nav): ?>
                            <a href="<?php print $nav->url; ?>" class="font-sans-alt mb-6 md:mb-0 md:mr-8 lg:mr-10 last:mr-0">
                                <?php print $nav->title; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="middle-container">
                <div class="mb-10 text-center">
                    <?php print apply_filters( 'the_content', $footer_text ); ?>
                </div>
                <?php if ($social_links): ?>
                    <div class="social-links mb-[70px] text-center">
                        <?php foreach ($social_links as $social): ?>
                            <?php
                                $icon = $social['icon']['url'];
                            ?>
                            <div class="mr-8 last:mr-0 text-center">
                                <p class="inline-block">
                                    <a href="<?php print $social['link']['url']; ?>" target="_new" class="flex flex-col">
                                        <img src="<?php print $icon; ?>" class="w-[45px] h-[45px] mb-[17px] mx-auto inline-block">
                                        <span class="btn-text-3 uppercase"><?php print $social['link']['title']; ?></span>
                                    </a>
                                </p>   
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($bottom_button_links): ?>
                    <div class="bottom-button text-center mb-10 flex flex-col md:flex-row flex-wrap justify-center items-center">
                        <?php foreach ($bottom_button_links as $btn): ?>
                            <a href="<?php print $btn['link']['url']; ?>" class="button small mb-[10px] md:mb-0 md:mr-[10px] md:last:mr-0">
                                <?php print $btn['link']['title']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="bottom-container border-t border-metal pt-10">
                <div class="flex text-center items-center flex-col md:flex-row md:justify-between ">
                    <p class="p3 mb-3 md:mb-0">© Copyright <?php print date('Y')?>. The Boatshed Restaurants. <a href="/privacy-policy">Privacy Policy</a>.</p>
                    <p class="p3"><a href="https://pictura.digital/" target="_new">Website Design Sydney</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>