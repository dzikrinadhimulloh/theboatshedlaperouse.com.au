<?php
    $total_page = $args['total_page'];
    $page       = $args['page'];
?>
<div class="flex justify-center color-black">
    <a href="#prev-page" class="mr-5"><p>Prev</p></a>
    <?php for ($i=1; $i <= $total_page; $i++):?>
        <a href="#select-page" data-page="<?php print $i ?>" class="page-no mx-5 <?php print $i == $page ? 'active' : '';?>">
            <p><?php print $i; ?></p>
        </a>
    <?php endfor; ?>
    <a href="#next-page" class="ml-5"><p>Next</p></a>
</div>