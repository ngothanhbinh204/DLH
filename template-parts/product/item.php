<?php
/**
 * Template part: Product Item (New UI)
 */
$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$link = get_the_permalink();
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