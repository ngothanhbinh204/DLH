<?php
/**
 * Template part: Post Item (Grid)
 */

if ( empty($args['post_id']) ) return;

$post_id = (int) $args['post_id'];

$thumb   = get_the_post_thumbnail_url($post_id, 'medium');
$cats    = get_the_category($post_id);
$cat_name = $cats[0]->name ?? '';
?>

<div class="news-item group">
	<div class="img">
		<a class="img-ratio ratio:pt-[318_440] zoom-img"
		   href="<?php echo esc_url( get_permalink($post_id) ); ?>">
			<?php if ($thumb): ?>
				<img
					class="lozad"
					data-src="<?php echo esc_url($thumb); ?>"
					alt="<?php echo esc_attr( get_the_title($post_id) ); ?>"
				/>
			<?php endif; ?>
		</a>
	</div>

	<div class="content xl:p-6 p-4">
		<h3 class="heading-5 font-semibold group-hover:text-Primary-2 mb-3">
			<a href="<?php echo esc_url( get_permalink($post_id) ); ?>">
				<?php echo esc_html( get_the_title($post_id) ); ?>
			</a>
		</h3>

		<div class="bottom-content flex items-center gap-2 font-normal body-4 font-secondary">
			<div class="day">
				<?php echo esc_html( get_the_date('d.m.Y', $post_id) ); ?>
			</div>
			<div class="dot"></div>
			<div class="category text-Primary-1">
				<?php echo esc_html($cat_name); ?>
			</div>
		</div>
	</div>
</div>
