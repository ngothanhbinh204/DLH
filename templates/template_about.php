<?php
/**
 * Template Name: Trang Giới Thiệu
 */
get_header();

// Banner
$about_banner_image = get_field('about_banner_image');
$about_banner_title = get_field('about_banner_title');

// Section 1: Facilities
$about_1_enable = get_field('about_1_enable');
$about_1_sub_title = get_field('about_1_sub_title');
$about_1_title = get_field('about_1_title');
$about_1_facilities = get_field('about_1_facilities');

// Section 2: About Overview
$about_2_enable = get_field('about_2_enable');
$about_2_sub_title = get_field('about_2_sub_title');
$about_2_title = get_field('about_2_title');
$about_2_description = get_field('about_2_description');
$about_2_image = get_field('about_2_image');

// Section 3: Vision & Mission
$about_3_enable = get_field('about_3_enable');
$about_3_items = get_field('about_3_items');

// Section 4: Core Values
$about_4_enable = get_field('about_4_enable');
$about_4_sub_title = get_field('about_4_sub_title');
$about_4_title = get_field('about_4_title');
$about_4_description = get_field('about_4_description');
$about_4_values = get_field('about_4_values');

// Section 5: Certificates
$about_5_enable = get_field('about_5_enable');
$about_5_background = get_field('about_5_background');
$about_5_sub_title = get_field('about_5_sub_title');
$about_5_title = get_field('about_5_title');
$about_5_gallery = get_field('about_5_gallery');
?>

<section class="page-banner-main">
    <?php if ($about_banner_image): ?>
    <div class="img img-ratio pt-[calc(640/1920*100rem)]">
        <?php echo get_image_attrachment($about_banner_image); ?>
    </div>
    <?php endif; ?>
    <div class="content-banner">
        <div class="container-fluid">
            <?php if ($about_banner_title): ?>
                <h2 class="title"><?php echo esc_html($about_banner_title); ?></h2>
            <?php endif; ?>
            <?php if (function_exists('rank_math_the_breadcrumbs')): ?>
            <div class="global-breadcrumb">
                <?php rank_math_the_breadcrumbs(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($about_1_enable && $about_1_facilities): ?>
<section class="about-1 section-py bg-Utility-gray-50">
    <div class="container-fluid">
        <div class="wrap-heading text-center mb-base">
            <?php if ($about_1_sub_title): ?>
                <div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-3"><?php echo $about_1_sub_title; ?></div>
            <?php endif; ?>
            <?php if ($about_1_title): ?>
                <h2 class="title heading-1 uppercase"><?php echo $about_1_title; ?></h2>
            <?php endif; ?>
        </div>
        <div class="swiper-column-auto relative swiper-loop autoplay">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($about_1_facilities as $facility): ?>
                    <div class="swiper-slide">
                        <div class="facility-item">
                            <?php if ($facility['image']): ?>
                            <div class="img img-ratio ratio:pt-[465_828]">
                                <?php echo get_image_attrachment($facility['image']); ?>
                            </div>
                            <?php endif; ?>
                            <div class="content mt-6 text-center">
                                <?php if ($facility['title']): ?>
                                <h3 class="title heading-2 font-extrabold text-Primary-1 mb-4">
                                    <?php if ($facility['link']): ?>
                                        <a href="<?php echo esc_url($facility['link']['url']); ?>" target="<?php echo esc_attr($facility['link']['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($facility['title']); ?>
                                        </a>
                                    <?php else: ?>
                                        <?php echo esc_html($facility['title']); ?>
                                    <?php endif; ?>
                                </h3>
                                <?php endif; ?>
                                <?php if ($facility['description']): ?>
                                <div class="desc body-1 font-normal font-secondary">
                                    <?php echo $facility['description']; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="wrap-button-slide">
                <div class="btn btn-sw-1 btn-prev"></div>
                <div class="btn btn-sw-1 btn-next"></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($about_2_enable): ?>
<section class="about-2 section-py">
    <div class="container-fluid">
        <div class="wrap-heading grid lg:grid-cols-2 grid-cols-1 gap-8 xl:mb-16 mb-base">
            <div class="col-left">
                <?php if ($about_2_sub_title): ?>
                    <div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-4"><?php echo $about_2_sub_title; ?></div>
                <?php endif; ?>
                <?php if ($about_2_title): ?>
                    <h2 class="title heading-1 uppercase"><?php echo $about_2_title; ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-right">
                <?php if ($about_2_description): ?>
                    <div class="format-content body-1 font-normal font-secondary">
                        <?php echo $about_2_description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($about_2_image): ?>
        <div class="wrap-img">
            <div class="img">
                <a class="img-ratio ratio:pt-[638_1720]" href="<?php echo get_image_attrachment($about_2_image, 'url'); ?>" data-fancybox>
                    <?php echo get_image_attrachment($about_2_image); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($about_3_enable && $about_3_items): ?>
<section class="about-3 section-py !pt-0">
    <div class="container">
        <div class="wrapper-main">
            <?php foreach ($about_3_items as $index => $item): 
                $is_even = ($index % 2 == 0);
            ?>
            <div class="wrapper grid md:grid-cols-2 items-center <?php echo ($index > 0) ? 'mt-base' : ''; ?>">
                <div class="col-left <?php echo $is_even ? '' : 'md:order-2'; ?>">
                    <div class="content-top mb-base">
                        <?php if ($item['sub_title']): ?>
                            <div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-4"><?php echo $item['sub_title']; ?></div>
                        <?php endif; ?>
                        <?php if ($item['title']): ?>
                            <h2 class="title heading-1 uppercase"><?php echo $item['title']; ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="content-bottom">
                        <?php if ($item['description']): ?>
                            <div class="desc body-1 font-normal font-secondary">
                                <?php echo $item['description']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-right <?php echo $is_even ? '' : 'md:order-1'; ?>">
                    <?php if ($item['image']): ?>
                    <div class="img">
                        <a class="img-ratio ratio:pt-[440_660] zoom-img" href="<?php echo get_image_attrachment($item['image'], 'url'); ?>" data-fancybox="vision-mission">
                            <?php echo get_image_attrachment($item['image']); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($about_4_enable && $about_4_values): ?>
<section class="about-4 xl:py-15 py-10">
    <div class="container-fluid">
        <div class="wrap-heading text-center xl:mb-16 mb-base">
            <?php if ($about_4_sub_title): ?>
                <div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-3"><?php echo $about_4_sub_title; ?></div>
            <?php endif; ?>
            <?php if ($about_4_title): ?>
                <h2 class="title heading-1 uppercase mb-4"><?php echo $about_4_title; ?></h2>
            <?php endif; ?>
            <?php if ($about_4_description): ?>
                <div class="desc body-1 font-normal font-secondary">
                    <?php echo $about_4_description; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="wrap-list grid grid-cols-3 gap-x-6 xl:gap-y-16 gap-y-10">
            <?php foreach ($about_4_values as $index => $value): ?>
            <div class="item">
                <div class="content-left">
                    <div class="number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                    <div class="line"></div>
                </div>
                <div class="content-right">
                    <?php if ($value['icon']): ?>
                    <div class="icon">
                        <img class="img-svg" src="<?php echo esc_url($value['icon']['url']); ?>" alt="<?php echo esc_attr($value['title']); ?>">
                    </div>
                    <?php endif; ?>
                    <div class="content-right-bottom">
                        <?php if ($value['title']): ?>
                            <h3 class="title heading-2 font-bold"><?php echo $value['title']; ?></h3>
                        <?php endif; ?>
                        <?php if ($value['description']): ?>
                            <div class="desc">
                                <?php echo $value['description']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($about_5_enable && $about_5_gallery): ?>
<section class="about-5 section-py" <?php if ($about_5_background): ?>setBackground="<?php echo get_image_attrachment($about_5_background, 'url'); ?>"<?php endif; ?>>
    <div class="container-fluid">
        <div class="wrap-heading text-center mb-base">
            <?php if ($about_5_sub_title): ?>
                <div class="sub-title heading-4 font-semibold text-Utility-gray-500 mb-3"><?php echo $about_5_sub_title; ?></div>
            <?php endif; ?>
            <?php if ($about_5_title): ?>
                <h2 class="title heading-1"><?php echo $about_5_title; ?></h2>
            <?php endif; ?>
        </div>
        <div class="big-wrapper">
            <div class="relative mt-10">
                <div class="ratio-wrapper lg:img-ratio lg:ratio:pt-[535_1720]">
                    <div class="ratio-inner lg:absolute inset-0 w-full h-full">
                        <div class="wrapper lg:overflow-hidden h-full flex items-center">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($about_5_gallery as $image): ?>
                                    <div class="dynamic-slide swiper-slide">
                                        <div class="img transition-all duration-500">
                                            <a class="img-ratio ratio:pt-[364_264] zoom-img" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery">
                                                <?php echo get_image_attrachment($image); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>