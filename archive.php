<?php
get_header();

$page_id = get_the_ID();
$banner_image = get_field('banner_image', $page_id);
$banner_src   = is_array($banner_image) ? $banner_image['url'] : $banner_image;
$banner_title = get_field('banner_title', $page_id) ?: get_the_title($page_id);

$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'paged'          => $paged,
);
$products_query = new WP_Query($args);

?>

<main>
	<!-- Section 1: Banner & Breadcrumb -->
	<section class="page-banner-main">
		<?php if ($banner_src): ?>
		<div class="img img-ratio pt-[calc(640/1920*100rem)]">
			<?php echo get_image_attrachment($banner_image, "image") ?>
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
	<section class="product section-py">
		<div class="container-fluid">
			<div class="wrapper-list grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 xl:gap-20 gap-base">
				<?php if ($products_query->have_posts()) : ?>
				<?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
				<?php 
                        get_template_part('template-parts/product/item'); 
                        ?>
				<?php endwhile; ?>
				<?php else : ?>
				<div class="col-span-full">
					<p><?php _e('Dữ liệu đang được cập nhật.', 'canhcamtheme'); ?></p>
				</div>
				<?php endif; ?>
			</div>

			<?php
                if (function_exists('canhcam_pagination')) {
                    canhcam_pagination($products_query);
                }
            ?>
		</div>
	</section>
</main>

<?php
get_footer();
?>