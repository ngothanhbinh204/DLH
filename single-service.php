<?php
/**
 * Single Template for Dịch Vụ (Service Detail)
 */

get_header();

$top_sub    = get_field('service_top_subtitle');
$top_desc   = get_field('service_top_desc');
$top_image  = get_field('service_top_image');
$sections   = get_field('service_content_sections'); 
$top_img_url = $top_image ? (is_array($top_image) ? $top_image['url'] : $top_image) : '';

?>

<section class="global-breadcrumb">
	<div class="container">
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
	</div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="service-1 section-py">
	<div class="container-fluid">
		<div class="wrapper-content rem:max-w-[1134px] w-full mx-auto text-center mb-base">
			<h1 class="title heading-1 font-semibold mb-3"><?php the_title(); ?></h1>
			<?php if($top_sub): ?>
			<div class="sub-title heading-3 font-semibold"><?php echo esc_html($top_sub); ?></div>
			<?php endif; ?>
			<div class="desc mt-6 body-1 font-secondary font-normal">
				<?php 
                        if ($top_desc) {
                            echo wpautop($top_desc); 
                        } else {
                            the_excerpt(); 
                        }
                    ?>
			</div>
		</div>
		<?php if($top_img_url): ?>
		<div class="img">
			<a class="img-ratio ratio:pt-[549_1720]" href="javascript:void(0);">
				<img class="lozad" data-src="<?php echo esc_url($top_img_url); ?>"
					alt="<?php the_title_attribute(); ?>" />
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php if ($sections): $counter = 1; foreach ($sections as $sec): 
        $sec_img_url = is_array($sec['image']) ? $sec['image']['url'] : $sec['image'];
        
     
        $is_even = ($counter % 2 == 0); 
    ?>

<?php if (!$is_even): ?>
<section class="service-2 section-py !pt-0">
	<div class="container-fluid">
		<div class="wrapper-service grid lg:grid-cols-2 grid-cols-1 xl:gap-0 gap-base items-center">
			<div class="col-left xl:pr-8">
				<?php if($sec_img_url): ?>
				<div class="img img-ratio ratio:pt-[465_828] zoom-img">
					<img class="lozad" data-src="<?php echo esc_url($sec_img_url); ?>"
						alt="<?php echo esc_attr($sec['title']); ?>" />
				</div>
				<?php endif; ?>
			</div>
			<div class="col-right xl:pl-8">
				<h2 class="title heading-2 font-extrabold mb-6"><?php echo esc_html($sec['title']); ?></h2>
				<div class="format-content">
					<?php echo $sec['content']; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php else:  ?>
<section class="service-3 section-py bg-Utility-gray-50">
	<div class="container-fluid">
		<div class="wrapper-service grid lg:grid-cols-2 grid-cols-1 items-center xl:gap-0 gap-base">
			<div class="col-left xl:pr-3">
				<h2 class="title heading-2 font-extrabold mb-6"><?php echo esc_html($sec['title']); ?></h2>
				<div class="format-content">
					<?php echo $sec['content']; ?>
				</div>
			</div>
			<div class="col-right xl:pl-3">
				<?php if($sec_img_url): ?>
				<div class="img img-ratio ratio:pt-[465_828] zoom-img">
					<img class="lozad" data-src="<?php echo esc_url($sec_img_url); ?>"
						alt="<?php echo esc_attr($sec['title']); ?>" />
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php $counter++; endforeach; endif; ?>

<?php endwhile; endif; ?>

<section class="service-4 section-py">
	<div class="container-fluid">
		<h2 class="title heading-2 font-extrabold mb-base text-center">
			<?php _e('Other Services', 'canhcamtheme'); ?>
		</h2>
		<div class="swiper-column-auto relative autoplay swiper-loop">
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php
                            $related_args = array(
                                'post_type' => 'service',
                                'posts_per_page' => 6,
                                'post__not_in' => array(get_the_ID()),
                            );
                            $related_query = new WP_Query($related_args);
                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
								$excerpt   = get_field('service_top_desc', get_the_ID());
                        ?>
					<div class="swiper-slide">
						<div class="service-item">
							<div class="img">
								<a class="img-ratio ratio:pt-[224_400] zoom-img" href="<?php the_permalink(); ?>">
									<?php if($thumb_url): ?>
									<img class="lozad" data-src="<?php echo esc_url($thumb_url); ?>"
										alt="<?php the_title_attribute(); ?>" />
									<?php endif; ?>
								</a>
							</div>
							<div class="content mt-6">
								<h3 class="title heading-3 font-semibold mb-2">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="desc body-1 font-secondary font-normal line-clamp-2">
									<?php echo wp_trim_words($excerpt, 30); ?>
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
			</div>
			<div class="arrow-button flex-center gap-6 mt-base">
				<div class="btn btn-sw-1 btn-prev"></div>
				<div class="btn btn-sw-1 btn-next"></div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>