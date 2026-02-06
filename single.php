<?php
/**
 * Single Post Template
 * Mapping: UI/NewsDetail.html
 */
get_header();

?>

<main>
    <!-- Breadcrumb -->
    <section class="global-breadcrumb">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </section>

    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $current_id = get_the_ID();
        $cats       = get_the_category();
        $cat_name   = !empty($cats) ? $cats[0]->name : '';
    ?>
    
    <section class="news-detail section-py">
        <div class="container">
            <div class="news-detail-main grid grid-cols-12 gap-base">
                
                <!-- MAIN CONTENT (Left Col) -->
                <div class="col-left lg:col-span-8 col-span-full">
                    <div class="position-relative relative">
                        <h1 class="rem:text-[32px] text-Primary-1 font-bold"><?php the_title(); ?></h1>
                        <div class="news-item-meta py-3 flex gap-2 border-b border-b-Neutral-200"> 
                            <div class="news-item-date text-Utility-gray-300"><?php echo get_the_date('F d, Y'); ?></div>
                        </div>
                        <div class="format-content"> 
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Sticky Share -->
                        <div class="sticky-share-post absolute right-full top-0 mr-5 bottom-0">
                            <div class="detail-share flex lg:flex-col gap-5 sticky top-[calc(var(--header-height)+1.5625rem)]">
                                <ul> 
                                    <li> <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>', 'Facebook', 'width=600,height=400')"> <i class="fa-brands fa-facebook-f"></i></a></li>
                                    <!-- Add more share buttons as needed -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR (Right Col: Related Posts) -->
                <div class="col-right lg:col-span-4 col-span-full">
                    <h2 class="rem:text-[36px] font-bold text-Primary-1 mb-6">
                        <?php _e('Bài viết liên quan', 'canhcamtheme'); ?>
                    </h2>
                    <div class="news-detail-list flex flex-col gap-6">
                        <?php
                            $related_args = array(
                                'category__in'   => wp_list_pluck($cats, 'term_id'),
                                'post__not_in'   => array($current_id),
                                'posts_per_page' => 4,
                                'orderby'        => 'date'
                            );
                            $related_query = new WP_Query($related_args);
                            
                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        ?>
                        <div class="news-item overflow-hidden grid grid-cols-[40.68%_1fr] gap-6 items-center border-none"> 
                            <div class="img"> 
                                <a class="img-ratio ratio:pt-[101_179] zoom-img" href="<?php the_permalink(); ?>"> 
                                    <?php if($thumb_url): ?>
                                    <img class="lozad" data-src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>"/>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="content"> 
                                <div class="top flex items-center gap-2 pb-2 mb-2 border-b border-b-Utility-gray-200">
                                    <div class="date"><?php echo get_the_date('d.m.Y'); ?></div>
                                    <div class="category text-Primary-1"><?php echo esc_html($cat_name); ?></div>
                                </div>
                                <div class="bottom"> 
                                    <div class="title body-1 font-bold mb-2 line-clamp-2"> 
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                                endwhile; 
                                wp_reset_postdata();
                            else:
                                echo '<p>Không có bài viết liên quan.</p>';
                            endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>