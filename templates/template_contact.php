<?php
/**
 * Template Name: Liên hệ
 */
get_header();

// Get fields
$page_main_title = get_field('page_main_title') ?: 'Head Office';
$office_list = get_field('office_list');
$form_enable = get_field('form_section_enable');
$form_bg = get_field('form_bg');
$form_title = get_field('form_title');
$form_desc = get_field('form_desc');
$form_shortcode = get_field('form_shortcode');
$page_id = get_the_ID();
$banner_image = get_field('banner_image', $page_id);
$banner_src   = is_array($banner_image) ? $banner_image['url'] : $banner_image;
$banner_title = get_field('banner_title', $page_id) ?: get_the_title($page_id);
// Banner
// get_template_part('modules/common/banner'); 
?>
<!-- Section 1: Office List -->
<section class="page-banner-main">
	<div class="img img-ratio pt-[calc(640/1920*100rem)]">
		<?php echo get_image_attrachment($banner_image, "image") ?>
	</div>
	<div class="content-banner">
		<div class="container-fluid">
			<h2 class="title"><?php echo esc_html($banner_title); ?></h2>
			<div class="global-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</section>
<section class="contact section-py">
	<div class="container">
		<h2 class="title heading-1 text-center uppercase text-Primary-1 mb-base">
			<?php echo esc_html($page_main_title); ?>
		</h2>

		<div class="wrapper-main flex flex-col">
			<?php if ($office_list) : ?>
			<?php foreach ($office_list as $index => $office) : 
                        $office_title = $office['office_title'];
                        $office_details = $office['office_details'];
                        $office_map = $office['office_map'];
                    ?>
			<div
				class="wrapper grid lg:grid-cols-2 grid-cols-1 items-center gap-base border-t border-t-Primary-1 py-10">
				<div class="col-left">
					<h3 class="title heading-36 font-bold mb-base"><?php echo esc_html($office_title); ?></h3>

					<?php if ($office_details) : ?>
					<div class="contact-info flex flex-col gap-4">
						<?php foreach ($office_details as $detail) : ?>
						<div
							class="item flex items-center gap-6 body-1 border-b border-b-Utility-gray-200 pb-4 last:border-b-0 last:pb-0">
							<div class="label rem:max-w-[240px] w-full font-bold">
								<?php echo esc_html($detail['label']); ?></div>
							<div class="link flex-1">
								<?php echo wp_kses_post($detail['content']); ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="col-right">
					<?php if ($office_map) : ?>
					<div class="map img-ratio ratio:pt-[380_680]">
						<?php echo $office_map; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Section 2: Contact Form -->
<?php if ($form_enable) : ?>
<section class="contact-2 section-py"
	<?php if($form_bg) echo 'style="background-image: url(' . esc_url($form_bg) . '); background-size: cover; background-position: center;"'; ?>>
	<div class="container">
		<div class="wrap-form-box rem:max-w-[1160px] w-full mx-auto">
			<div class="wrap-heading text-center text-white mb-base">
				<?php if ($form_title) : ?>
				<h2 class="title heading-2 uppercase font-bold mb-2"><?php echo esc_html($form_title); ?></h2>
				<?php endif; ?>

				<?php if ($form_desc) : ?>
				<div class="desc body-1 font-normal">
					<p><?php echo wp_kses_post($form_desc); ?></p>
				</div>
				<?php endif; ?>
			</div>

			<?php if ($form_shortcode) : ?>
			<div class="cf7-custom-wrapper">
				<?php echo do_shortcode($form_shortcode); ?>
			</div>
			<?php else : ?>
			<!-- Fallback HTML Form if no shortcode (for visualization only) -->
			<form>
				<div class="wrap-form grid md:grid-cols-2 grid-cols-1 gap-4">
					<div class="form-group">
						<input type="text" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Full Name">
					</div>
					<div class="form-group textarea w-full">
						<textarea placeholder="Message"></textarea>
					</div>
				</div>
				<div class="form-submit flex-center mt-base">
					<button class="btn btn-primary"><span>Submit</span>
						<div class="icon"> <img class="img-svg"
								src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt=""></div>
					</button>
				</div>
			</form>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>