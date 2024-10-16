<?php

get_header();
?>
<div class="w-[1100px] m-auto">
    <?php
if(have_posts()) :
    while(have_posts()) : the_post();
?>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2><?php echo the_title(); ?></h2>
                        <ul class="bread-list">
                            <li><a href="index.html">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">
                                <?php echo the_title(); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <!-- News Head -->
                                <div class="news-head">
                                    <?php 
                                        the_post_thumbnail('blog-single');
                                    ?>
                                </div>
                                <!-- News Title -->
                                <h1 class="news-title"><?php echo the_title(); ?></h1>
                                <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author">
                                            <a href="#">
                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/author1.jpg"
                                                    alt="#">
                                                <?php echo get_the_author(); ?>
                                            </a>
                                        </span>
                                        <span class="date">
                                            <i class="fa fa-clock-o"></i>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="comments">
                                            <a href="#">
                                                <i class="fa fa-comments"></i>
                                                <?php echo get_comments_number(); ?> Comments
                                            </a>
                                        </span>
                                        <!-- <span class="views"><i class="fa fa-eye"></i>33K Views</span> -->
                                    </div>
                                </div>
                                <!-- News Text -->
                                <div class="news-text">
                                    <?php the_content(); ?>
                                </div>
                                <div class="blog-bottom">
                                    <!-- Social Share -->
                                    <ul class="social-share">
                                        <li class="facebook"><a href="#"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                        <li class="twitter"><a href="#"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                    <!-- Next Prev -->
                                    <ul class="prev-next">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                    </ul>
                                    <!--/ End Next Prev -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php
                                if(comments_open() || get_comments_number()) {
                                    comments_template();
                                }
                            ?>
                        </div>
                        <div class="col-12">
                            <div class="blog-comments">
                                <h2>All Comments</h2>
                                <?php
                                if(get_comments_number()) {
                            ?>
                                <div class="comments-body">

                                    <?php
                                        $comments = get_comments([
                                            'post_id' => get_the_ID(),
                                            'status' => 'approve'
                                        ]);

                                        foreach($comments as $comment) {
                                    ?>
                                    <!-- Single Comments -->
                                    <div class="single-comments">
                                        <div class="main">
                                            <div class="head">
                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/author1.jpg"
                                                    alt="#" />
                                            </div>
                                            <div class="body">
                                                <h4><?php echo $comment->comment_author; ?></h4>
                                                <div class="comment-meta">
                                                    <span class="meta">
                                                        <i class="fa fa-calendar"></i>
                                                        <?php echo get_comment_date('F j, Y', get_comment_ID()); ?>
                                                    </span>
                                                    <span class="meta">
                                                        <i class="fa fa-clock-o"></i>
                                                        <?php echo get_comment_date('g:i a', get_comment_ID()); ?>
                                                    </span>
                                                </div>
                                                <p>
                                                    <?php echo $comment->comment_content; ?>
                                                </p>
                                                <a href="#"><i class="fa fa-reply"></i>replay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Comments -->
                                    <?php } ?>
                                </div>
                                <?php
                                }
                            ?>
                            </div>
                        </div>
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <div class="form">
                                <input type="email" placeholder="Search Here...">
                                <a class="button" href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <div class="single-widget">
                            <?php echo do_shortcode('[custom_media_gallery]'); ?>
                        </div>
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Blog Categories</h3>
                            <ul class="categor-list">
                                <?php
                                foreach(get_the_category() as $category) {
                                ?>
                                <li><a
                                        href="<?php echo get_category_link($category->cat_ID)  ?>"><?php echo $category->name ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );

                            $query = new WP_Query($args);
                            if($query->have_posts()) :
                                while($query->have_posts()) : $query->the_post();
                            ?>

                            <!-- Single Post -->
                            <div class="single-post">
                                <div class="image">
                                    <?php the_post_thumbnail('blog-image'); ?>
                                </div>
                                <div class="content">
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <ul class="comment">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_post_time(
                                            'F j, Y'
                                        ) ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Post -->
                            <?php
                                    endwhile;
                                endif;
                            ?>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                <?php
                                foreach(get_the_tags() as $tag) {
                                ?>
                                <li><a href="<?php echo get_tag_link($tag->term_id)  ?>"><?php echo $tag->name ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Single News -->

    <?php
    endwhile;
endif;
?>
</div>
<?php
get_footer();