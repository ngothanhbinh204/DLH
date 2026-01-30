<?php
get_header();
?>

<!-- Breadcrumb Section -->
<section class="global-breadcrumb">
	<div class="container">
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
	</div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post();
        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>
<section class="market-detail section-py bg-Utility-gray-50">
	<div class="container-fluid">
		<div class="wrapper grid items-center lg:grid-cols-[61.10%_1fr] grid-cols-1 gap-base xl:gap-15">
			<div class="col-left">
				<?php if($thumb_url): ?>
				<div class="img img-ratio ratio:pt-[591_1051] zoom-img">
					<img class="lozad" data-src="<?php echo esc_url($thumb_url); ?>"
						alt="<?php the_title_attribute(); ?>" />
				</div>
				<?php endif; ?>
			</div>
			<div class="col-right">
				<h2 class="title heading-2 font-extrabold text-Primary-1 mb-4"><?php the_title(); ?></h2>
				<div class="format-content body-1 font-secondary text-justify">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>

<!-- Other Markets Section (Related Post Loop) -->
<section class="other-market section-py">
	<div class="container-fluid">
		<div class="swiper-column-auto relative autoplay swiper-loop">
			<div class="wrap-heading flex md:flex-row flex-col items-center justify-between mb-base">
				<h2 class="title heading-2 font-extrabold text-Primary-1">Other Markets & Applications</h2>
				<div class="wrap-button lg:flex hidden items-center gap-6">
					<div class="btn btn-sw-1 btn-prev gray"></div>
					<div class="btn btn-sw-1 btn-next gray"></div>
				</div>
			</div>
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php
                            $related_args = array(
                                'post_type' => 'market',
                                'posts_per_page' => 6,
                                'post__not_in' => array(get_the_ID()), // Loại trừ bài hiện tại
                                'orderby' => 'rand' // Hoặc 'date'
                            );
                            $related_query = new WP_Query($related_args);
                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                        ?>
					<div class="swiper-slide">
						<?php get_template_part('template-parts/market/item'); ?>
					</div>
					<?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
				</div>
				<div class="wrap-button-slide xl:hidden flex">
					<div class="btn btn-sw-1 btn-prev gray"></div>
					<div class="btn btn-sw-1 btn-next gray"></div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>