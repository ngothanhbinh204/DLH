<?php
/**
 * Category Template
 */
get_header();

/* ================================
   1. SETUP CURRENT TERM + ROOT
================================ */
$current_term = get_queried_object();
$taxonomy     = 'category';
$current_id   = $current_term->term_id;

// tìm ROOT category
$root_id = $current_id;
while ($parent = get_term($root_id, $taxonomy)->parent) {
    $root_id = $parent;
}
$root_term = get_term($root_id);

/* ================================
   2. BANNER INHERITANCE SYSTEM
================================ */
$banner_src   = '';
$banner_title = single_cat_title('', false);

$term_id = $current_id;
while ($term_id) {
    $banner = get_field('banner_image', $taxonomy . '_' . $term_id);
    if ($banner) {
        $banner_src   = is_array($banner) ? $banner['url'] : $banner;
        $banner_title = get_term($term_id)->name;
        break;
    }
    $term = get_term($term_id, $taxonomy);
    $term_id = $term->parent;
}

// fallback page config
if (!$banner_src) {
    $page = get_page_by_path('news') ?: get_page_by_path('tin-tuc');
    if ($page) {
        $banner_title = get_field('banner_title', $page->ID) ?: get_the_title($page->ID);
        $img = get_field('banner_image', $page->ID);
        $banner_src = is_array($img) ? $img['url'] : $img;
    }
}


$child_categories = get_terms([
    'taxonomy'   => $taxonomy,
    'parent'     => $root_id,
    'hide_empty' => false
]);
?>

<main>
	<section class="page-banner-main">
		<?php if ($banner_src): ?>
		<div class="img img-ratio pt-[calc(640/1920*100rem)]">
			<img class="lozad" data-src="<?php echo esc_url($banner_src); ?>"
				alt="<?php echo esc_attr($banner_title); ?>" />
		</div>
		<?php endif; ?>
		<div class="content-banner">
			<div class="container-fluid">
				<h1 class="title"><?php echo esc_html($banner_title); ?></h1>
				<div class="global-breadcrumb">
					<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="news section-py">
		<div class="container">
			<ul class="nav-primary">
				<li class="<?php echo ($current_id == $root_id) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url(get_category_link($root_id)); ?>">
						<?php _e('All', 'canhcamtheme'); ?>
					</a>
				</li>
				<?php foreach ($child_categories as $child): ?>
				<li class="<?php echo ($current_id == $child->term_id) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url(get_category_link($child->term_id)); ?>">
						<?php echo esc_html($child->name); ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php if (have_posts()) :
                $posts_array = [];
                while (have_posts()) { the_post(); $posts_array[] = get_post(); }

                $post_large = $posts_array[0] ?? null;
                $posts_list = array_slice($posts_array, 1, 3);
                $posts_grid = array_slice($posts_array, 4);
            ?>

			<div class="news-main grid lg:grid-cols-2 rem:gap-[29px] mt-base">
				<?php if ($post_large):
                    $thumb_l = get_the_post_thumbnail_url($post_large->ID, 'large');
                    $cat_l   = get_the_category($post_large->ID);
                    $cat_name_l = $cat_l[0]->name ?? '';
                ?>
				<div class="col-left">
					<div class="news-item overflow-hidden border-none">
						<div class="img">
							<a class="img-ratio ratio:pt-[382_680] zoom-img"
								href="<?php echo get_permalink($post_large->ID); ?>">
								<?php if($thumb_l): ?>
								<img class="lozad" data-src="<?php echo esc_url($thumb_l); ?>"
									alt="<?php echo esc_attr($post_large->post_title); ?>" />
								<?php endif; ?>
							</a>
						</div>
						<div class="content mt-5">
							<div class="top flex items-center gap-2">
								<div class="date"><?php echo get_the_date('d.m.Y', $post_large->ID); ?></div>
								<div class="category text-Primary-1"><?php echo esc_html($cat_name_l); ?></div>
							</div>
							<div class="bottom">
								<div class="title title-20 font-bold mb-2">
									<a
										href="<?php echo get_permalink($post_large->ID); ?>"><?php echo esc_html($post_large->post_title); ?></a>
								</div>
								<div class="desc line-clamp-3 text-Utility-gray-800">
									<p><?php echo get_the_excerpt($post_large->ID); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="col-right">
					<?php foreach ($posts_list as $p):
                        $thumb_s = get_the_post_thumbnail_url($p->ID, 'medium');
                        $cat_s   = get_the_category($p->ID);
                        $cat_name_s = $cat_s[0]->name ?? '';
                    ?>
					<div class="news-item overflow-hidden grid md:grid-cols-2 md:gap-0 gap-4 mb-4 last:mb-0">
						<div class="img xl:pr-11">
							<a class="img-ratio ratio:pt-[168_328] zoom-img"
								href="<?php echo get_permalink($p->ID); ?>">
								<?php if($thumb_s): ?>
								<img class="lozad" data-src="<?php echo esc_url($thumb_s); ?>"
									alt="<?php echo esc_attr($p->post_title); ?>" />
								<?php endif; ?>
							</a>
						</div>
						<div class="content">
							<div class="top flex items-center gap-2 pb-4 mb-4 border-b border-b-Utility-gray-200">
								<div class="date"><?php echo get_the_date('d.m.Y', $p->ID); ?></div>
								<div class="category text-Primary-1"><?php echo esc_html($cat_name_s); ?></div>
							</div>
							<div class="bottom">
								<div class="title title-20 font-bold mb-2 line-clamp-2">
									<a
										href="<?php echo get_permalink($p->ID); ?>"><?php echo esc_html($p->post_title); ?></a>
								</div>
								<div class="desc line-clamp-3 text-Utility-gray-800">
									<p><?php echo get_the_excerpt($p->ID); ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ($posts_grid): ?>
			<div class="news-list grid md:grid-cols-3 gap-base mt-base">
				<?php foreach ($posts_grid as $p):
                    $thumb_g = get_the_post_thumbnail_url($p->ID, 'medium');
                    $cat_g   = get_the_category($p->ID);
                    $cat_name_g = $cat_g[0]->name ?? '';
                ?>
				<div class="news-item group">
					<div class="img">
						<a class="img-ratio ratio:pt-[318_440] zoom-img" href="<?php echo get_permalink($p->ID); ?>">
							<?php if($thumb_g): ?>
							<img class="lozad" data-src="<?php echo esc_url($thumb_g); ?>"
								alt="<?php echo esc_attr($p->post_title); ?>" />
							<?php endif; ?>
						</a>
					</div>
					<div class="content xl:p-6 p-4">
						<h3 class="heading-5 font-semibold group-hover:text-Primary-2 mb-3">
							<a href="<?php echo get_permalink($p->ID); ?>"><?php echo esc_html($p->post_title); ?></a>
						</h3>
						<div class="bottom-content flex items-center gap-2 font-normal body-4 font-secondary">
							<div class="day"><?php echo get_the_date('d.m.Y', $p->ID); ?></div>
							<div class="dot"></div>
							<div class="category text-Primary-1"><?php echo esc_html($cat_name_g); ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<div class="pagination mt-base">
				<?php
				if (function_exists('canhcam_pagination')) {
					canhcam_pagination();
				}
			?>
			</div>

			<?php else: ?>
			<div class="py-10 text-center text-gray-500">Updating...</div>
			<?php endif; ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>