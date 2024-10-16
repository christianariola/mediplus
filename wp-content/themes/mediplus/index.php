<?php

get_header();
?>
<div class="w-[1100px] m-auto">
    <?php
if(have_posts()) :
    $index = 0;
    while(have_posts()) : the_post();
?>
    <div class="card mt-5 w-full flex flex-row border border-solid border-gray-500 rounded-2xl h-[280px]
        <?php if($index % 2 == 0) { ?> flex-row-reverse <?php } ?>
    ">
        <div class="post-cover w-[40%]">
            <?php
                if(has_post_thumbnail()) :
            ?>
            <a href="<?php the_permalink(); ?>">
                <?php
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'blog-cover');
                ?>
                <img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php the_title_attribute(); ?>"
                    class="<?php echo ($index % 2 == 0) ? 'rounded-tr-2xl rounded-br-2xl' : 'rounded-tl-2xl rounded-bl-2xl' ?>">
            </a>
            <?php
                endif; 
            ?>
        </div>
        <div class="flex flex-col w-[60%] m-5">
            <a href="<?php the_permalink(); ?>">
                <h1 class="text-[40px]"><?php echo the_title(); ?></h1>
                <hr>
                <p class="text-gray-500 mt-5">
                    <?php echo get_the_excerpt(); ?>
                </p>
            </a>
        </div>
    </div>
    <?php
        $index++;
    endwhile;
endif;
?>
    <div class="flex items-center m-auto m-5 p-5">
        <?php
        the_posts_pagination([
            'prev_text' => __('Previous page'),
            'next_text' => __('Next page'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page') . ' </span>',
        ]);
    ?>
    </div>
</div>
<?php
get_footer();