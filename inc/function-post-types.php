<?php
/**
 * Custom Post Types for Micco Quang Ninh
 * 
 * Post Types:
 * - product (Products)
 * - service (Services)
 * - tuyen-dung (Tuyển dụng / Recruitment)
 */

// ===================================================a=========================
// REGISTER PRODUCTS POST TYPE
// ============================================================================
function create_product_post_type() {
    $labels = array(
        'name'                  => 'Products',
        'singular_name'         => 'Product',
        'menu_name'             => 'Products',
        'name_admin_bar'        => 'Product',
        'archives'              => 'Product Archives',
        'attributes'            => 'Product Attributes',
        'parent_item_colon'     => 'Parent Product:',
        'all_items'             => 'All Products',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'Add New',
        'new_item'              => 'New Product',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Products',
        'search_items'          => 'Search Products',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into product',
        'uploaded_to_this_item' => 'Uploaded to this product',
        'items_list'            => 'Products list',
        'items_list_navigation' => 'Products list navigation',
        'filter_items_list'     => 'Filter products list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'product', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-products',
        'show_in_rest'        => true,
    );

    register_post_type('product', $args);
}
add_action('init', 'create_product_post_type');

// Register Product Category Taxonomy
function create_product_taxonomy() {
    $labels = array(
        'name'                       => 'Product Categories',
        'singular_name'              => 'Product Category',
        'search_items'               => 'Search Categories',
        'popular_items'              => 'Popular Categories',
        'all_items'                  => 'All Categories',
        'parent_item'                => 'Parent Category',
        'parent_item_colon'          => 'Parent Category:',
        'edit_item'                  => 'Edit Category',
        'update_item'                => 'Update Category',
        'add_new_item'               => 'Add New Category',
        'new_item_name'              => 'New Category Name',
        'separate_items_with_commas' => 'Separate categories with commas',
        'add_or_remove_items'        => 'Add or remove categories',
        'choose_from_most_used'      => 'Choose from the most used categories',
        'not_found'                  => 'No categories found',
        'menu_name'                  => 'Product Categories',
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'product-category'),
        'show_in_rest'          => true,
    );

    register_taxonomy('product-category', array('product'), $args);
}
add_action('init', 'create_product_taxonomy');

// ============================================================================
// REGISTER SERVICES POST TYPE
// ============================================================================
function create_service_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded to this service',
        'items_list'            => 'Services list',
        'items_list_navigation' => 'Services list navigation',
        'filter_items_list'     => 'Filter services list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'services', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-admin-tools',
        'show_in_rest'        => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'create_service_post_type');

// Register Service Category Taxonomy
// function create_service_taxonomy() {
//     $labels = array(
//         'name'                       => 'Service Categories',
//         'singular_name'              => 'Service Category',
//         'search_items'               => 'Search Categories',
//         'popular_items'              => 'Popular Categories',
//         'all_items'                  => 'All Categories',
//         'parent_item'                => 'Parent Category',
//         'parent_item_colon'          => 'Parent Category:',
//         'edit_item'                  => 'Edit Category',
//         'update_item'                => 'Update Category',
//         'add_new_item'               => 'Add New Category',
//         'new_item_name'              => 'New Category Name',
//         'separate_items_with_commas' => 'Separate categories with commas',
//         'add_or_remove_items'        => 'Add or remove categories',
//         'choose_from_most_used'      => 'Choose from the most used categories',
//         'not_found'                  => 'No categories found',
//         'menu_name'                  => 'Service Categories',
//     );

//     $args = array(
//         'hierarchical'          => true,
//         'labels'                => $labels,
//         'show_ui'               => true,
//         'show_admin_column'     => true,
//         'query_var'             => true,
//         'rewrite'               => array('slug' => 'service-category'),
//         'show_in_rest'          => true,
//     );

//     register_taxonomy('service-category', array('service'), $args);
// }
// add_action('init', 'create_service_taxonomy');


function register_market_post_type() {
    $labels = array(
        'name'                  => _x( 'Markets', 'Post Type General Name', 'canhcamtheme' ),
        'singular_name'         => _x( 'Market', 'Post Type Singular Name', 'canhcamtheme' ),
        'menu_name'             => __( 'Markets', 'canhcamtheme' ),
        'all_items'             => __( 'All Markets', 'canhcamtheme' ),
        'add_new_item'          => __( 'Add New Market', 'canhcamtheme' ),
        'add_new'               => __( 'Add New', 'canhcamtheme' ),
        'new_item'              => __( 'New Market', 'canhcamtheme' ),
        'edit_item'             => __( 'Edit Market', 'canhcamtheme' ),
        'update_item'           => __( 'Update Market', 'canhcamtheme' ),
        'view_item'             => __( 'View Market', 'canhcamtheme' ),
    );
    $args = array(
        'label'                 => __( 'Market', 'canhcamtheme' ),
        'description'           => __( 'Market Description', 'canhcamtheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // Hỗ trợ đủ các field cơ bản
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-store', // Icon phù hợp
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false, 
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'market'), // Slug URL
    );
    register_post_type( 'market', $args );
}
add_action( 'init', 'register_market_post_type', 0 );

add_action('plugins_loaded', function() {
    // Bail if Rank Math isn't active
    if ( ! ( defined( 'RANK_MATH_VERSION' ) || function_exists( 'rank_math' ) || class_exists( 'RankMath' ) ) ) {
        return;
    }

    $custom_taxonomies = array(
        'product-category',
        'service-category',
        'tuyen-dung-category',
    );

    // add taxonomies to Rank Math lists
    add_filter( 'rank_math/sitemap/taxonomies', function( $taxonomies ) use ( $custom_taxonomies ) {
        return array_merge( (array) $taxonomies, $custom_taxonomies );
    }, 20 );

    add_filter( 'rank_math/metabox/taxonomies', function( $taxonomies ) use ( $custom_taxonomies ) {
        return array_merge( (array) $taxonomies, $custom_taxonomies );
    }, 20 );

    // ensure metabox appears on each taxonomy term editor
    foreach ( $custom_taxonomies as $taxonomy ) {
        add_filter( "rank_math/metabox/taxonomy/{$taxonomy}", '__return_true' );
    }

    // optional: ensure taxonomy included in sitemap
    add_filter( 'rank_math/sitemap/include_taxonomy', function( $include, $taxonomy ) use ( $custom_taxonomies ) {
        if ( in_array( $taxonomy, $custom_taxonomies, true ) ) {
            return true;
        }
        return $include;
    }, 20, 2 );
});

// ============================================================================
// BREADCRUMB INTEGRATION FOR CUSTOM POST TYPES
// ============================================================================
add_filter( 'rank_math/frontend/breadcrumb/items', function( $crumbs, $class ) {

    if ( ! is_singular() ) {
        return $crumbs;
    }

    // Map CPT => taxonomy
    $map = array(
        'product'     => 'product-category',
        'service'     => 'service-category',
        'tuyen-dung'  => 'tuyen-dung-category',
    );

    $post = get_queried_object();
    if ( ! $post || ! isset( $post->post_type ) ) {
        return $crumbs;
    }

    $post_type = $post->post_type;
    if ( empty( $map[ $post_type ] ) ) {
        return $crumbs;
    }

    $taxonomy = $map[ $post_type ];

    // Get terms assigned to the post for that taxonomy
    $terms = wp_get_post_terms( $post->ID, $taxonomy );

    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return $crumbs;
    }

    // Choose a term — currently: first in the returned array.
    $term = $terms[0];

    // Build breadcrumb item: [ label, url ]
    $term_item = array( $term->name, get_term_link( $term ) );

    // Avoid duplicates: check if already present
    foreach ( $crumbs as $c ) {
        if ( isset( $c[1] ) && untrailingslashit( $c[1] ) === untrailingslashit( $term_item[1] ) ) {
            return $crumbs;
        }
    }

    // Insert before last item (which is usually the post title)
    $insert_at = max( 0, count( $crumbs ) - 1 );
    array_splice( $crumbs, $insert_at, 0, array( $term_item ) );

    // Re-index to keep numeric keys continuous
    $crumbs = array_values( $crumbs );

    return $crumbs;
}, 15, 2 );