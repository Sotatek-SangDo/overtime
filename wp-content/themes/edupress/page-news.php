<?php
/*
Template Name: News Page
* Created by: sang.do
* Date: 19/9/2017
*/
?>

<?php get_header(); ?>

<div id="site-main" class="content-home">
    <div class="wrapper wrapper-main clearfix">
        <div class="wrapper-frame clearfix">
            <?php get_sidebar(); ?>
            <main id="site-content" class="site-main" role="main">
                <div class="news-page">
                    <h3 class="title-page">Tin tức</h3>
                        <div class="row">
                            <?php
                                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                $query = query_get_posts_by_category('news', 10, $paged);
                                if( $query->have_posts() ) :
                            ?>
                                <?php
                                    while( $query->have_posts() ) : $query->the_post();
                                ?>
                                    <div class="col-md-4 col">
                                        <div class="card">
                                            <div class="view overlay hm-white-slight">
                                                <?php if(!has_post_thumbnail()) : ?>
                                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/none_image.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                                                <?php else : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="mask"></div>
                                                </a>
                                            </div>
                                            <div class="post_info">
                                                <p>
                                                    <i class="fa fa-user-o" aria-hidden="true"></i><?php the_author(); ?> |
                                                    <i class="fa fa-calendar" aria-hidden="true"></i><?php the_date('Y-m-d'); ?> |
                                                    <i class="fa fa-eye" aria-hidden="true"></i> <?php getPostViews( the_ID() ); ?> lượt xem.
                                                </p>
                                            </div>
                                            <div class="card-block">
                                                <h4 class="card-title"><?php the_title(); ?></h4>
                                                <p class="card-text"><?php the_content('Xem thêm ...', true); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-primary waves-effect waves-light">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    endwhile;
                                else:
                                ?>
                                    <p style="color: red; font-size: 18px;"> No post.</p>
                                <?php
                                    endif;
                                    custom_pagination($query->max_num_pages, '', $paged);
                                ?>
                        </div>
                    </div>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
