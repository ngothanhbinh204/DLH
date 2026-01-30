<?php
/**
 * Single Template for Sản Phẩm (Product Detail)
 */
get_header();

// 1. Get ACF Data
$gallery            = get_field('product_gallery'); // Return Array
$info_top           = get_field('info_product_top'); // Repeater
$info_bottom        = get_field('info_product_bottom'); // Repeater
$cert_image         = get_field('certification_image'); // Image
$applications       = get_field('product_applications', 'option'); // Repeater (Blue section)

// Fallback for gallery if empty (Use Featured Image)
if (!$gallery && has_post_thumbnail()) {
    $gallery = [
        [
            'url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'alt' => get_the_title()
        ]
    ];
}
?>

<main>
	<!-- Breadcrumb -->
	<section class="global-breadcrumb">
		<div class="container">
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
		</div>
	</section>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="product-detail-1 section-py bg-Utility-gray-50">
		<div class="container-fluid">
			<!-- Main Grid -->
			<div class="product-detail-main flex flex-col lg:flex-row xl:gap-20 gap-base">

				<!-- Left Column: Gallery Slider -->
				<div class="col-left xl:rem:max-w-[820px] lg:w-2/4 w-full">
					<?php if ($gallery): ?>
					<div
						class="wrapper grid md:grid-cols-[calc(147/820*100%)_1fr] grid-cols-[calc(120/820*100%)_1fr] gap-[calc(24/820*100%)]">
						<!-- Thumb Slider (Vertical) -->
						<div class="thumb relative">
							<div class="relative size-full">
								<div class="swiper" id="product-thumb-slider">
									<div class="swiper-wrapper">
										<?php foreach ($gallery as $image): ?>
										<div class="swiper-slide">
											<div class="img">
												<a class="img-ratio">
													<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>"
														alt="<?php echo esc_attr($image['alt']); ?>" />
												</a>
											</div>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<!-- Nav Thumbs -->
							<div class="wrap-button-slide arrow-vertical">
								<div class="button-prev"></div>
								<div class="button-next"></div>
							</div>
						</div>

						<!-- Main Slider -->
						<div class="main">
							<div class="swiper" id="product-main-slider">
								<div class="swiper-wrapper">
									<?php foreach ($gallery as $image): ?>
									<div class="swiper-slide">
										<div class="img">
											<a class="img-ratio" data-fancybox="gallery"
												href="<?php echo esc_url($image['url']); ?>">
												<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>"
													alt="<?php echo esc_attr($image['alt']); ?>" />
											</a>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
							<!-- Nav Main (Mobile mostly or as design) -->
							<div class="arrow-button">
								<div class="btn btn-sw-1 btn-prev"></div>
								<div class="btn btn-sw-1 btn-next"></div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>

				<!-- Right Column: Info -->
				<div class="col-right flex-1">
					<h1 class="text-Primary-1 heading-2 font-extrabold mb-3 title-product"><?php the_title(); ?></h1>

					<div class="format-content body-1 font-secondary font-normal">
						<?php the_content(); ?>
					</div>

					<div class="wrap-info-product">

						<!-- Info Product Top (Repeater) -->
						<?php if ($info_top): ?>
						<div class="info-product-top">
							<?php foreach ($info_top as $item): ?>
							<div class="item">
								<div class="label"><?php echo esc_html($item['label']); ?></div>
								<div class="value">
									<div class="number"><?php echo esc_html($item['number']); ?></div>
									<div class="unit"><?php echo esc_html($item['unit']); ?></div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<!-- Info Product Bottom (Repeater) -->
						<?php if ($info_bottom): ?>
						<div class="info-product-bottom">
							<?php foreach ($info_bottom as $item): ?>
							<div class="item">
								<div class="title"><?php echo esc_html($item['title']); ?>:</div>
								<div class="format-content">
									<?php echo $item['content']; // ACF Textarea/Wysiwyg ?>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<!-- Certification -->
						<?php 
                        $cert_url = is_array($cert_image) ? $cert_image['url'] : $cert_image;
                        if ($cert_url): 
                        ?>
						<div class="info-product-certification">
							<span class="text">Certification: </span>
							<div class="img-certification">
								<img src="<?php echo esc_url($cert_url); ?>" alt="Certification">
							</div>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; endif; ?>

	<!-- Section 2: Applications (Blue bg) -->
	<?php if ($applications): ?>
	<section class="product-detail-2 bg-[#005092]">
		<div class="container-fluid">
			<div class="wrapper grid lg:grid-cols-4 grid-cols-2">
				<?php foreach ($applications as $app): 
                    $icon_url = is_array($app['icon']) ? $app['icon']['url'] : $app['icon'];
                ?>
				<div class="item xl:px-6 xl:py-8 p-3 flex flex-col items-center justify-center">
					<?php if($icon_url): ?>
					<div class="icon">
						<img class="img-svg" src="<?php echo esc_url($icon_url); ?>"
							alt="<?php echo esc_attr($app['title']); ?>">
					</div>
					<?php endif; ?>
					<div class="content text-white mt-6 text-center">
						<div class="title heading-3 font-semibold mb-3"><?php echo esc_html($app['title']); ?></div>
						<div class="desc body-1 font-normal text-white/50">
							<p><?php echo esc_html($app['description']); ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- Section 3: Related Products -->
	<section class="other-product section-py">
		<div class="container-fluid">
			<div class="swiper-column-auto relative autoplay swiper-loop">
				<div class="wrap-heading flex items-center justify-between mb-base">
					<h2 class="title heading-2 font-extrabold text-Primary-1">
						<?php _e('Other Products', 'canhcamtheme'); ?>
					</h2>
					<div class="wrap-button lg:flex hidden items-center gap-6">
						<div class="btn btn-sw-1 btn-prev gray"></div>
						<div class="btn btn-sw-1 btn-next gray"></div>
					</div>
				</div>
				<div class="swiper">
					<div class="swiper-wrapper">
						<?php
                        $terms = get_the_terms(get_the_ID(), 'product-category');
                        $related_args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 6,
                            'post__not_in' => array(get_the_ID()),
                        );
                        // Query theo danh mục nếu có
                        if ($terms && !is_wp_error($terms)) {
                            $term_ids = wp_list_pluck($terms, 'term_id');
                            $related_args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'product-category',
                                    'field' => 'term_id',
                                    'terms' => $term_ids,
                                )
                            );
                        }
                        
                        $related_query = new WP_Query($related_args);
                        if ($related_query->have_posts()):
                            while ($related_query->have_posts()): $related_query->the_post();
                        ?>
						<div class="swiper-slide">
							<?php get_template_part('template-parts/product/item'); ?>
						</div>
						<?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
					</div>
				</div>
				<div class="wrap-button-slide xl:hidden flex">
					<div class="btn btn-sw-1 btn-prev gray"></div>
					<div class="btn btn-sw-1 btn-next gray"></div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>