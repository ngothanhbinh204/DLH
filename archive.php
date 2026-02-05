<?php
get_header();

$banner_image = get_field('banner_default_archive', 'option');

?>

	<!-- Baner -->
	<section class="page-banner-main">
		<?php if ($banner_image): ?>
			<div class="img img-ratio pt-[calc(640/1920*100rem)]">
				<?php echo get_image_attrachment($banner_image, 'image'); ?>
			</div>
		<?php endif; ?>

		<div class="content-banner">
			<div class="container-fluid">
				<h2 class="title"><?php echo esc_html(post_type_archive_title('', false)); ?></h2>
				<div class="global-breadcrumb">
					<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</section>

	<!-- List -->
	<section class="archive-list section-py">
		<div class="container-fluid">
			<div class="wrapper-list grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 xl:gap-20 gap-base">

				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php
						$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
						$link      = get_the_permalink();
						?>
						<div class="product-item">
							<div class="block-thumb">
								<div class="thumb img-ratio ratio:pt-[540_373]">
									<?php echo get_image_post(get_the_ID(), 'image') ?>
								</div>
							</div>
							<div class="block-info">
								<div class="child">
									<h4 class="info-name"><?php the_title(); ?></h4>
									<div class="desc-project-list">
										<?php the_excerpt(); ?>
									</div>
									<div class="btn-view-more">
										<a class="btn btn-primary" href="<?php echo esc_url($link); ?>">
											<span>
												<?php _e('SEE MORE', 'canhcamtheme'); ?>
											</span>
											<div class="icon">
												<img class="img-svg" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="" />
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<div class="col-span-full">
						<p><?php _e('Data not found.', 'canhcamtheme'); ?></p>
					</div>
				<?php endif; ?>

			</div>

			<?php
			if (function_exists('canhcam_pagination')) {
				canhcam_pagination();
			}
			?>
		</div>
	</section>

<?php
get_footer();
