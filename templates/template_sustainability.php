<?php
/**
 * Template Name: Sustainability Page
 * 
 * Mapping from: UI/Sustainability.html
 */

get_header();

// --- GET ACF FIELDS ---

// 1. Banner
$banner_image   = get_field('sus_banner_image');
$banner_title   = get_field('sus_banner_title');

// 2. Vision
$vis_title      = get_field('sus_vision_title');
$vis_desc       = get_field('sus_vision_desc');
$vis_image      = get_field('sus_vision_image');

// 3. Strategy
$str_bg         = get_field('sus_strategy_bg');
$str_title      = get_field('sus_strategy_title');
$str_desc       = get_field('sus_strategy_desc');
$str_list       = get_field('sus_strategy_list'); // Repeater

// 4. Commitment (Field Op)
$com_bg         = get_field('sus_com_bg');
$com_sub        = get_field('sus_com_subtitle');
$com_desc       = get_field('sus_com_desc');
$com_list       = get_field('sus_com_list'); // Repeater

// Process Images for URL
$banner_url = $banner_image ? (is_array($banner_image) ? $banner_image['url'] : $banner_image) : '';
$vis_img_url = $vis_image ? (is_array($vis_image) ? $vis_image['url'] : $vis_image) : '';
$str_bg_url = $str_bg ? (is_array($str_bg) ? $str_bg['url'] : $str_bg) : '';
$com_bg_url = $com_bg ? (is_array($com_bg) ? $com_bg['url'] : $com_bg) : '';

?>

<section class="page-banner-main">
	<?php if ($banner_url): ?>
	<div class="img img-ratio pt-[calc(640/1920*100rem)]">
		<img class="lozad" data-src="<?php echo esc_url($banner_url); ?>"
			alt="<?php echo esc_attr($banner_title); ?>" />
	</div>
	<?php endif; ?>
	<div class="content-banner">
		<div class="container-fluid">
			<h1 class="title"><?php echo esc_html($banner_title ?: get_the_title()); ?></h1>
			<div class="global-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</section>

<!-- Section 2: Vision -->
<section class="sustainability-1 section-py">
	<div class="container-fluid">
		<div class="wrapper grid lg:grid-cols-2 grid-cols-1 gap-8 mb-base">
			<div class="col-left">
				<h2 class="title heading-1 font-semibold ">
					<?php echo wp_kses_post($vis_title); ?>
				</h2>
			</div>
			<div class="col-right">
				<div class="format-content body-1 font-normal font-secondary text-justify">
					<?php echo wp_kses_post($vis_desc); ?>
				</div>
			</div>
		</div>
		<?php if ($vis_img_url): ?>
		<div class="img">
			<a class="img-ratio ratio:pt-[540_1720]" href="javascript:void(0);">
				<img class="lozad" data-src="<?php echo esc_url($vis_img_url); ?>" alt="Vision" />
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>

<!-- Section 3: Title -->
<section class="sustainability-2 section-py" <?php if($str_bg_url) echo 'setBackground="'.esc_url($str_bg_url).'"'; ?>>
	<div class="container-fluid">
		<div class="wrapper grid grid-cols-12">
			<div class="col-left xl:col-span-7 col-span-full xl:rem:pr-[270px]">
				<h2 class="title heading-1 font-semibold mb-4"><?php echo esc_html($str_title); ?></h2>
				<div class="format-content body-1 font-normal font-secondary">
					<?php echo $str_desc; ?>
				</div>
			</div>
			<div class="col-right xl:col-span-5 col-span-full xl:rem:pl-[23px]">
				<div class="swiper-column-auto relative effect pagination-dot">
					<div class="swiper">
						<div class="swiper-wrapper">
							<?php if($str_list): foreach($str_list as $item): ?>
							<div class="swiper-slide">
								<div class="box-item">
									<div class="wrap-top">
										<div class="number"><?php echo esc_html($item['number']); ?></div>
									</div>
									<div class="wrap-bottom">
										<h3 class="title text-32 font-extrabold mb-8 text-white">
											<?php echo esc_html($item['title']); ?></h3>
										<div class="format-content body-1 font-normal font-secondary text-white/80">
											<?php echo $item['content']; ?>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; endif; ?>
						</div>
					</div>
					<div class="wrap flex items-center justify-between">
						<div class="swiper-pagination"></div>
						<div class="arrow-button flex items-center gap-6">
							<div class="btn btn-sw-1 btn-prev"></div>
							<div class="btn btn-sw-1 btn-next"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section 4: Commitment (Field Op) -->
<section class="section-field-op">
	<div class="field-op">
		<div class="section-field-op-img relative"
			<?php if($com_bg_url) echo 'setBackground="'.esc_url($com_bg_url).'"'; ?>>

			<!-- Overlay Static/Intro Part -->
			<div class="field-op-intro-overlay absolute inset-0 z-10 rem:h-[860px] flex flex-col">
				<div
					class="intro-content-top text-center xl:rem:pt-[116px] py-8 px-4 absolute left-2/4 -translate-x-2/4 z-[160]">
					<div class="sub-title text-Primary-1 font-semibold mb-4 uppercase tracking-wider body-1">
						<?php echo esc_html($com_sub); ?>
					</div>
					<div class="desc heading-3 font-normal text-Utility-gray-800 rem:max-w-[1160px] mx-auto">
						<?php echo $com_desc; ?>
					</div>
				</div>
				<!-- Intro Titles Grid -->
				<div class="field-op-intro-grid flex-1 flex xl:flex-row">
					<?php if($com_list): foreach($com_list as $index => $item): 
                            $extra_class = ($index < count($com_list) - 1) ? ' xl:border-r border-r-gray-200 -xl:border-b border-b-gray-200' : '';
                        ?>
					<div
						class="intro-item flex-1 flex items-center justify-center py-10 xl:py-0<?php echo $extra_class; ?>">
						<h3 class="xl:text-7xl text-5xl font-extrabold text-Primary-1 uppercase">
							<?php echo esc_html($item['title']); ?></h3>
					</div>
					<?php endforeach; endif; ?>
				</div>
			</div>

			<!-- Swiper Dynamic Part -->
			<div class="swiper swiper-field-op">
				<ul class="swiper-wrapper field-op-list">
					<?php if($com_list): foreach($com_list as $index => $item): 
                             $item_bg = is_array($item['image']) ? $item['image']['url'] : $item['image'];
                             $active_class = ($index === 0) ? ' active' : '';
                        ?>
					<li class="swiper-slide field-op-item<?php echo $active_class; ?> relative xl:flex-1 rem:!h-[860px] overflow-hidden group transition-1000 ease-linear"
						data-background="<?php echo esc_url($item_bg); ?>">

						<div class="wrap-content-top absolute top-0 left-0 xl:py-20 w-full text-center">
							<div class="sub-title"><?php echo esc_html($com_sub); ?></div>
							<h3 class="title-active"><?php echo esc_html($item['title']); ?></h3>
							<h3 class="title heading-1 font-bold transition-all-500-linear text-white/50 uppercase">
								<?php echo esc_html($item['title']); ?></h3>
						</div>

						<div class="info absolute bottom-0 left-0 z-2 w-full p-7 text-white transition-all-500-linear">
							<div class="content body-2 mt-2.25 xl:opacity-0 xl:invisible transition-all-500-linear">
								<?php echo $item['content'];?>
							</div>
						</div>
					</li>
					<?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>