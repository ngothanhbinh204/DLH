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
				<h2 class="title heading-2 font-extrabold text-Primary-1">
					<?php echo __('Other Markets & Applications', 'canhcamtheme'); ?>
				</h2>
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
								$title     = get_the_title();
								$excerpt   = get_the_excerpt();
								$link      = get_permalink();
								$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/img/placeholder.png';
                        ?>
					<div class="swiper-slide">
						<div class="market-item">
							<div class="img">
								<a class="img-ratio ratio:pt-[559_828] zoom-img" href="<?php echo esc_url($link); ?>">
									<?php echo get_image_post(get_the_ID(), "image"); ?>
								</a>
							</div>
							<div class="wrap-content text-white">
								<div class="title heading-2 font-extrabold uppercase mb-2 py-6 xl:px-10 px-4">
									<a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
								</div>
								<div
									class="wrap-content-bottom border-t-2 border-t-white xl:p-10 p-5 flex items-center justify-between gap-base">
									<div class="desc body-1 font-normal font-secondary line-clamp-2">
										<p><?php echo wp_trim_words($excerpt, 30); ?></p>
									</div>
									<div class="btn-view-more">
										<a class="btn btn-primary" href="<?php echo esc_url($link); ?>">
											<span><?php echo esc_html__('SEE MORE', 'canhcamtheme'); ?></span>
											<div class="icon">
												<img class="img-svg" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg"
													alt="" />
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
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