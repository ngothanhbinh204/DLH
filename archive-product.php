<?php
get_header();

// 1. Lấy dữ liệu cấu hình từ Page "Sản phẩm" (slug: product)
// Đây là nơi nhập Banner, Tiêu đề cho trang Archive
$page_slug = 'product' || 'san-pham' || 'products';
$page_data = get_page_by_path($page_slug);
$page_id   = $page_data ? $page_data->ID : 0;
var_dump($page_id);

// Lấy ACF Field (Đồng bộ tên field với Market để dễ quản lý)
$banner_image = get_field('banner_image', $page_id);
$banner_src   = is_array($banner_image) ? $banner_image['url'] : $banner_image;
var_dump($banner_image);
$banner_title = get_field('banner_title', $page_id) ?: get_the_title($page_id);
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
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
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
                    canhcam_pagination(); // Sử dụng hàm có sẵn của theme cũ nếu vẫn dùng
                }
            ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>