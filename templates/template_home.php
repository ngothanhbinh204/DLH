<?php
/**
 * Template Name: Trang chủ
 */
?>

<?php get_header(); ?>

<?php
// Section 1: Banner
$home_1_enable = get_field('home_1_enable');
$home_1_banners = get_field('home_1_banners');

// Section 2: About
$home_2_enable = get_field('home_2_enable');
$home_2_sub_title = get_field('home_2_sub_title');
$home_2_title = get_field('home_2_title');
$home_2_description = get_field('home_2_description');
$home_2_button = get_field('home_2_button');
$home_2_map_image = get_field('home_2_map_image');
$home_2_networks = get_field('home_2_networks');

// Section 3: Products
$home_3_enable = get_field('home_3_enable');
$home_3_sub_title = get_field('home_3_sub_title');
$home_3_title = get_field('home_3_title');
$home_3_button = get_field('home_3_button');
$home_3_products = get_field('home_3_products');

// Section 4: Production System
$home_4_enable = get_field('home_4_enable');
$home_4_background = get_field('home_4_background');
$home_4_sub_title = get_field('home_4_sub_title');
$home_4_title = get_field('home_4_title');
$home_4_items = get_field('home_4_items');

// Section 5: News
$home_5_enable = get_field('home_5_enable');
$home_5_background = get_field('home_5_background');
$home_5_sub_title = get_field('home_5_sub_title');
$home_5_title = get_field('home_5_title');
$home_5_button = get_field('home_5_button');
$home_5_posts_per_page = get_field('home_5_posts_per_page') ?: 6;

// Section 6: CTA
$home_6_enable = get_field('home_6_enable');
$home_6_background = get_field('home_6_background');
$home_6_title = get_field('home_6_title');
$home_6_description = get_field('home_6_description');
$home_6_button = get_field('home_6_button');
?>

<?php if ($home_1_enable && $home_1_banners): ?>
<section class="home-1">
	<div class="slide relative">
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php foreach ($home_1_banners as $banner): ?>
				<div class="swiper-slide">
					<div class="home-1-banner relative">
						<?php if ($banner['link']): ?>
						<a class="img-ratio ratio:pt-[960_1920]" href="<?php echo esc_url($banner['link']['url']); ?>"
							target="<?php echo esc_attr($banner['link']['target'] ?: '_self'); ?>">
							<?php echo get_image_attrachment($banner['image']); ?>
						</a>
						<?php else: ?>
						<div class="img-ratio ratio:pt-[960_1920]">
							<?php echo get_image_attrachment($banner['image']); ?>
						</div>
						<?php endif; ?>
					</div>
					<div class="home-1-content">
						<div class="container-fluid">
							<div class="wrapper flex justify-between items-end pb-6 border-b border-b-white/50">
								<div class="col-left">
									<h2 class="title heading-banner font-bold uppercase block-title">
										<?php echo $banner['title']; ?></h2>
									<div class="desc rem:text-[32px] font-semibold">
										<?php echo $banner['description']; ?></div>
								</div>
								<?php if ($banner['button']): ?>
								<div class="col-right" data-aos="fade-left" data-aos-duration="600"
									data-aos-delay="400">
									<a class="btn btn-primary" href="<?php echo esc_url($banner['button']['url']); ?>"
										target="<?php echo esc_attr($banner['button']['target'] ?: '_self'); ?>">
										<span><?php echo esc_html($banner['button']['title']); ?></span>
										<div class="icon"><img class="img-svg"
												src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="">
										</div>
									</a>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="wrap-pagination">
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ($home_2_enable): ?>
<section class="home-2 section-py">
	<div class="container-fluid">
		<div class="wrapper grid items-center lg:grid-cols-[37.25%_1fr] grid-cols-1 xl:rem:gap-[78px] gap-base">
			<div class="col-left">
				<?php if ($home_2_sub_title): ?>
				<div class="sub-title text-Utility-gray-500 uppercase heading-4 mb-3"><?php echo $home_2_sub_title; ?>
				</div>
				<?php endif; ?>
				<?php if ($home_2_title): ?>
				<h2 class="title heading-1 block-title mb-6"><?php echo $home_2_title; ?></h2>
				<?php endif; ?>
				<?php if ($home_2_description): ?>
				<div class="desc body-1 font-normal mb-base font-secondary">
					<?php echo $home_2_description; ?>
				</div>
				<?php endif; ?>
				<?php if ($home_2_button): ?>
				<a class="btn btn-primary" href="<?php echo esc_url($home_2_button['url']); ?>"
					target="<?php echo esc_attr($home_2_button['target'] ?: '_self'); ?>">
					<span><?php echo esc_html($home_2_button['title']); ?></span>
					<div class="icon"><img class="img-svg"
							src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt=""></div>
				</a>
				<?php endif; ?>
			</div>
			<div class="col-right">
				<?php if ($home_2_map_image): ?>
				<div class="map xl:px-17 px-5 mb-6">
					<div class="img img-ratio ratio:pt-[532_864]">
						<?php echo get_image_attrachment($home_2_map_image); ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if ($home_2_networks): ?>
				<div class="box">
					<?php foreach ($home_2_networks as $network): ?>
					<div class="wrap-inner flex md:flex-row flex-col md:items-center items-start justify-between">
						<div class="left rem:max-w-[250px] w-full">
							<div class="title body-4 text-Utility-gray-500 font-normal uppercase mb-2 font-secondary">
								<?php echo $network['label']; ?>
							</div>
							<div class="nation heading-3 font-semibold"><?php echo $network['region']; ?></div>
						</div>
						<?php if ($network['countries']): ?>
						<div class="right grid grid-cols-3 rem:gap-[10px] flex-1 w-full">
							<?php 
                            $countries_array = array_chunk($network['countries'], ceil(count($network['countries']) / 3));
                            foreach ($countries_array as $column): 
                            ?>
							<div class="wrap-nation">
								<?php foreach ($column as $country): ?>
								<div class="nation-item flex items-center gap-1">
									<div class="icon"><i class="fa-solid fa-chevrons-right"></i></div>
									<div class="name-nation font-secondary"><?php echo $country['name']; ?></div>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ($home_3_enable): ?>
<section class="home-3 section-py">
	<div class="container-fluid">
		<div
			class="wrap-heading flex md:flex-row flex-col gap-base md:gap-0 md:items-end items-start justify-between xl:mb-15 mb-base">
			<div class="left md:w-2/4 w-full">
				<?php if ($home_3_sub_title): ?>
				<div class="sub-title heading-4 text-Utility-gray-500 font-semibold uppercase mb-3" data-aos="fade-up"
					data-aos-duration="500">
					<?php echo $home_3_sub_title; ?>
				</div>
				<?php endif; ?>
				<?php if ($home_3_title): ?>
				<h2 class="title heading-1 block-title"><?php echo $home_3_title; ?></h2>
				<?php endif; ?>
			</div>
			<?php if ($home_3_button): ?>
			<div class="right flex-1 justify-end flex" data-aos="fade-left" data-aos-duration="500"
				data-aos-delay="200">
				<a class="btn btn-primary" href="<?php echo esc_url($home_3_button['url']); ?>"
					target="<?php echo esc_attr($home_3_button['target'] ?: '_self'); ?>">
					<span><?php echo esc_html($home_3_button['title']); ?></span>
					<div class="icon"><img class="img-svg"
							src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt=""></div>
				</a>
			</div>
			<?php endif; ?>
		</div>
		<?php if ($home_3_products): ?>
		<div class="swiper-column-auto relative">
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ($home_3_products as $product_id): 
                        $product = get_post($product_id);
                        setup_postdata($product);
                    ?>
					<div class="swiper-slide">
						<div class="product-item">
							<div class="block-thumb">
								<div class="thumb img-ratio ratio:pt-[540_373]">
									<?php echo get_image_post($product_id); ?>
								</div>
							</div>
							<div class="block-info">
								<div class="child">
									<h4 class="info-name"><?php echo get_the_title($product_id); ?></h4>
									<ul class="desc-project-list">
										<?php echo get_the_excerpt($product_id); ?>
									</ul>
									<div class="btn-view-more">
										<a class="btn btn-primary" href="<?php echo get_permalink($product_id); ?>">
											<span>
												<?php echo esc_html__('SEE MORE', 'canhcamtheme'); ?>
											</span>
											<div class="icon"><img class="img-svg"
													src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg"
													alt="" /></div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php 
                    endforeach;
                    wp_reset_postdata();
                    ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if ($home_4_enable): ?>
<section class="home-4 section-py"
	<?php if ($home_4_background): ?>setBackground="<?php echo get_image_attrachment($home_4_background, 'url'); ?>"
	<?php endif; ?>>
	<div class="container-fluid">
		<div class="wrapper grid xl:grid-cols-2 grid-cols-1 rem:gap-[42px] items-center">
			<div class="col-left">
				<?php if ($home_4_sub_title): ?>
				<div class="sub-title heading-4 font-semibold uppercase mb-3"><?php echo $home_4_sub_title; ?></div>
				<?php endif; ?>
				<?php if ($home_4_title): ?>
				<h2 class="title heading-1 block-title"><?php echo $home_4_title; ?></h2>
				<?php endif; ?>
			</div>
			<?php if ($home_4_items): ?>
			<div class="col-right">
				<div class="lists grid lg:grid-cols-3 grid-cols-2 xl:gap-0 gap-base">
					<?php foreach ($home_4_items as $item): ?>
					<div class="item">
						<div class="title py-10 px-6 heading-3 font-semibold">
							<a href="<?php echo esc_url($item['link']['url']); ?>"
								target="<?php echo esc_attr($item['link']['target'] ?: '_self'); ?>">
								<?php echo esc_html($item['link']['title']); ?>
							</a>
						</div>
						<div class="description"><?php echo wp_kses_post($item['description']); ?></div>
						<div class="button-more inline-flex justify-end">
							<a href="<?php echo esc_url($item['link']['url']); ?>"
								target="<?php echo esc_attr($item['link']['target'] ?: '_self'); ?>">
								<i class="fa-light fa-arrow-right-long"></i>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ($home_5_enable): ?>
<section class="home-5 xl:py-24 py-10"
	<?php if ($home_5_background): ?>setBackground="<?php echo get_image_attrachment($home_5_background, 'url'); ?>"
	<?php endif; ?>>
	<div class="container-fluid">
		<div class="wrapper grid md:grid-cols-[27.94%_72.06%] grid-cols-1 items-center xl:gap-20 gap-base">
			<div class="col-left">
				<?php if ($home_5_sub_title): ?>
				<div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-3" data-aos="fade-up"
					data-aos-duration="500">
					<?php echo $home_5_sub_title; ?>
				</div>
				<?php endif; ?>
				<?php if ($home_5_title): ?>
				<h2 class="title heading-1 block-title mb-base"><?php echo $home_5_title; ?></h2>
				<?php endif; ?>
				<?php if ($home_5_button): ?>
				<a class="btn btn-primary" href="<?php echo esc_url($home_5_button['url']); ?>"
					target="<?php echo esc_attr($home_5_button['target'] ?: '_self'); ?>" data-aos="fade-up"
					data-aos-duration="500" data-aos-delay="200">
					<span><?php echo esc_html($home_5_button['title']); ?></span>
					<div class="icon"><img class="img-svg"
							src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt=""></div>
				</a>
				<?php endif; ?>
			</div>
			<div class="col-right">
				<?php
                $news_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $home_5_posts_per_page,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $news_query = new WP_Query($news_args);
                
                if ($news_query->have_posts()):
                ?>
				<div class="swiper-column-auto relative">
					<div class="swiper">
						<div class="swiper-wrapper">
							<?php while ($news_query->have_posts()): $news_query->the_post(); ?>
							<div class="swiper-slide">
								<div class="news-item group">
									<div class="img">
										<a class="img-ratio ratio:pt-[318_440] zoom-img"
											href="<?php the_permalink(); ?>">
											<?php echo get_image_post(get_the_ID()); ?>
										</a>
									</div>
									<div class="content xl:p-6 p-4">
										<h3 class="heading-5 font-semibold group-hover:text-Primary-2 mb-3">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div
											class="bottom-content flex items-center gap-2 font-normal body-4 font-secondary">
											<div class="day"><?php echo get_the_date('d.m.Y'); ?></div>
											<div class="dot"></div>
											<div class="category text-Primary-1">
												<?php 
                                                $categories = get_the_category();
                                                if ($categories) {
                                                    echo esc_html($categories[0]->name);
                                                }
                                                ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
				<?php 
                endif;
                wp_reset_postdata();
                ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ($home_6_enable): ?>
<section class="home-6"
	<?php if ($home_6_background): ?>setBackground="<?php echo get_image_attrachment($home_6_background, 'url'); ?>"
	<?php endif; ?>>
	<div class="container-fluid">
		<div
			class="wrap-content grid md:grid-cols-2 grid-cols-1 items-center gap-8 rem:max-w-[857px] w-full xl:py-15 xl:px-10 p-4 text-white">
			<div class="col-left">
				<?php if ($home_6_title): ?>
				<h2 class="title heading-1 block-title"><?php echo $home_6_title; ?></h2>
				<?php endif; ?>
			</div>
			<div class="col-right xl:rem:pl-[14px]">
				<?php if ($home_6_description): ?>
				<div class="desc body-1 font-normal font-secondary mb-8">
					<?php echo $home_6_description; ?>
				</div>
				<?php endif; ?>
				<?php if ($home_6_button): ?>
				<a class="btn btn-primary" href="<?php echo esc_url($home_6_button['url']); ?>"
					target="<?php echo esc_attr($home_6_button['target'] ?: '_self'); ?>" data-aos="fade-up"
					data-aos-duration="500" data-aos-delay="200">
					<span><?php echo esc_html($home_6_button['title']); ?></span>
					<div class="icon"><img class="img-svg"
							src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt=""></div>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>