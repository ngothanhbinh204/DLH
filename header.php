<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<?php echo get_field('field_config_head', 'options'); ?>
</head>

<body <?php body_class(get_field('add_class_body', get_the_ID())); ?>>
	<header class="header">
		<div class="header-wrapper">
			<div class="header-left">
				<div class="header-menu">
					<?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-left',
                        'container'      => false,
                        'menu_class'     => 'header-nav',
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s"><li><a href="' . home_url() . '"><i class="fa-solid fa-house"></i></a></li>%3$s</ul>',
                    ));
                    ?>
				</div>
			</div>
			<div class="header-logo">
				<?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . home_url() . '" alt="logo"><img src="' . get_template_directory_uri() . '/img/Logo.svg" alt="' . get_bloginfo('name') . '" /></a>';
                }
                ?>
			</div>
			<div class="header-right">
				<div class="header-menu">
					<?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-right',
                        'container'      => false,
                        'menu_class'     => 'header-nav',
                        'fallback_cb'    => false,
                    ));
                    ?>
				</div>
				<div class="header-right-inner">
					<div class="header-language">
						<?php echo do_shortcode('[custom_wpml_lang]'); ?>
					</div>
					<div class="header-search">
						<i class="fa-regular fa-magnifying-glass"></i>
					</div>
					<?php 
                    $header_contact = get_field('header_contact_link', 'option');
                    if ($header_contact): 
                        $link_url = $header_contact['url'];
                        $link_title = $header_contact['title'];
                        $link_target = $header_contact['target'] ? $header_contact['target'] : '_self';
                    ?>
					<div class="button-contact">
						<a href="<?php echo esc_url($link_url); ?>"
							target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					</div>
					<?php endif; ?>
					<div class="header-bar"><i class="fa-light fa-bars"></i></div>
				</div>
			</div>
		</div>
		<div class="nav-mobile">
			<div class="header-wrap-head">
				<div class="header-logo">
					<?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . home_url() . '" alt="logo"><img src="' . get_template_directory_uri() . '/img/Logo.svg" alt="' . get_bloginfo('name') . '" /></a>';
                    }
                    ?>
				</div>
				<div class="header-close"><i class="fa-light fa-xmark"></i></div>
			</div>
			<div class="header-wrap-menu">
				<?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-menu',
                    'container'      => false,
                    'menu_class'     => 'menu-mobile',
                    'fallback_cb'    => false,
                ));
                ?>
				<?php if ($header_contact): ?>
				<div class="button-contact">
					<a href="<?php echo esc_url($link_url); ?>"
						target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="header-overlay"></div>
	</header>

	<div class="header-search-form">
		<div
			class="close flex items-center justify-center absolute top-0 right-0 bg-white text-3xl cursor-pointer w-12.5 h-12.5">
			<i class="fa-light fa-xmark"></i>
		</div>
		<div class="container">
			<div class="wrap-form-search-product">
				<form action="<?php echo home_url(); ?>/" method="GET" role="form">
					<div class="productsearchbox">
						<input type="text" name="s" placeholder="<?php _e('Tìm kiếm thông tin', 'canhcamtheme'); ?>">
						<button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<main>