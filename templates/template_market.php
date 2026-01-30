<?php
/**
 * Template Name: Page: Market & Applications
 */

get_header();

// 1. Lấy dữ liệu từ Page cấu hình (Slug: market)
$page_slug = 'market';
$page_data = get_page_by_path($page_slug);
$page_id   = $page_data ? $page_data->ID : 0;

// ACF từ Page
$banner_image = get_field('banner_image', $page_id);
$banner_src   = is_array($banner_image) ? $banner_image['url'] : $banner_image;
$banner_title = get_field('banner_title', $page_id) ?: get_the_title($page_id);
?>

<section class="page-banner-main">
	<?php if ($banner_src): ?>
	<div class="img img-ratio pt-[calc(640/1920*100rem)]">
		<img class="lozad" data-src="<?php echo esc_url($banner_src); ?>"
			alt="<?php echo esc_attr($banner_title); ?>" />
	</div>
	<?php endif; ?>
	<div class="content-banner">
		<div class="container-fluid">
			<h2 class="title"><?php echo esc_html($banner_title); ?></h2>
			<div class="global-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</section>
<?php
	$market_query = new WP_Query([
  'post_type'      => 'market',
  'posts_per_page' => -1,
]);
	?>
<section class="market section-py">
	<div class="container-fluid">
		<div class="wrapper-list grid lg:grid-cols-2 grid-cols-1 xl:gap-16 gap-base">
			<?php if ($market_query->have_posts()) : ?>
			<?php while ($market_query->have_posts()) : $market_query->the_post();
					$title     = get_the_title();
					$excerpt   = get_the_excerpt();
					$link      = get_permalink();
					$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/img/placeholder.png';
					?>
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
			<?php endwhile; ?>
			<?php else : ?>
			<p><?php _e('Updating...', 'canhcamtheme'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>