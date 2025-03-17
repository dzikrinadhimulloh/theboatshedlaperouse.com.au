<?php
    $data = $args['data'];
?>

<div class="blog-loop-container">
    <?php if ($data): ?>
        <?php foreach ($data as $key => $item): ?>
            <a href="<?php print get_permalink( $item->ID ); ?>" class="flex flex-col lg:flex-row gap-6 lg:gap-10 border-b border-[#aaaaaa] my-10 first:mt-0 pb-10 ">
                <div class="basis-full lg:basis-5/12">
                    <div class="rounded-[10px] aspect-[32/25] overflow-hidden">
                        <img src="<?php print get_the_post_thumbnail_url( $item->ID ); ?>" alt="<?php print get_blog_thumb_alt_text($item); ?>" class="rounded-[10px] aspect-[32/25] hover:scale-110 transition-all duration-200 w-full">
                    </div>
                </div>
                <div class="basis-full lg:basis-7/12">
                    <p class="btn-text-2 mb-4 leading-tight text-black"><?php print get_the_date( 'd M Y', $item ); ?></p>
                    <h4 class="mb-[10px]"><?php print $item->post_title; ?></h4>
                    <p class="p2 text-black"><?php print get_the_excerpt( $item->ID ); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>