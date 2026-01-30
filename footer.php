<footer class="footer bg-Utility-gray-50 xl:pt-15 xl:pb-8 py-10">
	<div class="container-160">
		<div class="footer-top flex items-center justify-between">
			<div class="footer-logo rem:w-[86px]">
				<?php 
                $global_logo = get_field('global_logo', 'option');
                if ($global_logo): ?>
				<a class="img-ratio ratio:pt-[62_86]" href="<?php echo home_url(); ?>">
					<?php echo get_image_attrachment($global_logo); ?>
				</a>
				<?php endif; ?>
			</div>
			<div class="footer-top-social">
				<?php 
                $footer_socials = get_field('footer_socials', 'option');
                if ($footer_socials): ?>
				<ul>
					<?php foreach ($footer_socials as $item): 
                            $icon_class = $item['icon'] ? 'fa-brands fa-' . $item['icon'] : '';
                            $social_link = $item['link'];
                        ?>
					<?php if ($social_link): ?>
					<li>
						<a href="<?php echo esc_url($social_link['url']); ?>"
							target="<?php echo esc_attr($social_link['target'] ? $social_link['target'] : '_blank'); ?>">
							<i class="<?php echo esc_attr($icon_class); ?>"></i>
						</a>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="footer-mid">
			<div class="footer-wrapper grid lg:grid-cols-[5fr_5fr_2fr] md:grid-cols-1 gap-7">
				<?php if (get_field('footer_col_1_enable', 'option')): ?>
				<div class="footer-column">
					<h3 class="title font-semibold mb-4 text-base">
						<?php echo get_field('footer_col_1_title', 'option'); ?></h3>
					<?php 
                    $col_1_groups = get_field('footer_col_1_groups', 'option');
                    if ($col_1_groups): ?>
					<div class="wrapper-content flex flex-col gap-4">
						<?php foreach ($col_1_groups as $group): ?>
						<div class="footer-contact">
							<div class="sub-title font-semibold mb-3"><?php echo $group['sub_title']; ?></div>
							<ul class="infos flex flex-col gap-1">
								<?php if ($group['infos']): foreach ($group['infos'] as $info): 
                                            $info_link = $info['link'];
                                            $info_icon = $info['icon'] ? 'fa-light fa-' . $info['icon'] : 'fa-light fa-location-dot';
                                        ?>
								<?php if ($info_link): ?>
								<li>
									<a href="<?php echo esc_url($info_link['url']); ?>"
										target="<?php echo esc_attr($info_link['target'] ? $info_link['target'] : '_self'); ?>">
										<div class="icon">
											<i class="<?php echo esc_attr($info_icon); ?>"></i>
										</div><span><?php echo esc_html($info_link['title']); ?></span>
									</a>
								</li>
								<?php endif; ?>
								<?php endforeach; endif; ?>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if (get_field('footer_col_2_enable', 'option')): ?>
				<div class="footer-column">
					<h3 class="title font-semibold mb-4 text-base">
						<?php echo get_field('footer_col_2_title', 'option'); ?></h3>
					<div class="footer-contact">
						<ul class="infos flex flex-col gap-1">
							<?php 
                            $col_2_infos = get_field('footer_col_2_infos', 'option');
                            if ($col_2_infos): foreach ($col_2_infos as $info): 
                                $info_link = $info['link'];
                                $info_icon = $info['icon'] ? 'fa-light fa-' . $info['icon'] : 'fa-light fa-location-dot';
                            ?>
							<?php if ($info_link): ?>
							<li>
								<a href="<?php echo esc_url($info_link['url']); ?>"
									target="<?php echo esc_attr($info_link['target'] ? $info_link['target'] : '_self'); ?>">
									<div class="icon">
										<i class="<?php echo esc_attr($info_icon); ?>"></i>
									</div><span><?php echo esc_html($info_link['title']); ?></span>
								</a>
							</li>
							<?php endif; ?>
							<?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>

				<div class="footer-column">
					<h3 class="title font-semibold mb-4 text-base">
						<?php echo get_field('footer_col_3_title', 'option') ?: 'QUICK LINKS'; ?></h3>
					<?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-1',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => false,
                    ));
                    ?>
				</div>
			</div>
		</div>
		<div
			class="footer-bottom flex md:flex-row md:gap-0 gap-4 flex-col items-center justify-between body-4 font-secondary">
			<div class="footer-copyright text-Primary-1/80 md:text-left text-center">
				<?php echo get_field('footer_copyright', 'option'); ?>
			</div>
			<div class="footer-policy">
				<?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-3',
                    'container'      => false,
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ));
                ?>
			</div>
		</div>
	</div>

	<div class="tool-fixed-cta">
		<div class="tool-cta-item tool-cta-share">
			<a href="#"><i class="fa-solid fa-share-nodes"></i></a>
			<?php 
            $footer_fixed_socials = get_field('footer_fixed_socials', 'option');
            if ($footer_fixed_socials): 
                foreach ($footer_fixed_socials as $fsocial): 
                    $icon_class = $fsocial['icon'] ? 'fa-brands fa-' . $fsocial['icon'] : '';
                    if (in_array($fsocial['icon'], ['phone', 'location-dot', 'envelope'])) {
                        $icon_class = 'fa-solid fa-' . $fsocial['icon'];
                    }
                    $fsocial_link = $fsocial['link'];
                    if ($fsocial_link):
                    ?>
			<div class="tool-cta-item">
				<a href="<?php echo esc_url($fsocial_link['url']); ?>"
					target="<?php echo esc_attr($fsocial_link['target'] ? $fsocial_link['target'] : '_blank'); ?>">
					<i class="<?php echo esc_attr($icon_class); ?>"></i>
				</a>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="btn button-to-top">
			<div class="btn-icon">
				<div class="icon"></div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<?php echo get_field('field_config_body', 'options'); ?>
</body>

</html>