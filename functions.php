<?php

/**
 * Background functions for wordpress
 *
 * 1.0
 * load stylesheets
 */

function load_stylesheets(){
    wp_register_style(
        'bootstrap', // sheet name
        get_template_directory_uri() . '/css/bootstrap.min.css', // link to Dir
        array(), // dependant stylesheets
        false, // version
        'all' // applied on
    );
    wp_enqueue_style('bootstrap'); // add to the loading que

    wp_register_style(
        'stylesheet',
        get_template_directory_uri() . '/style.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets'); // add to style/scripts

/**
 * 2.0
 * load javascript and scripts
 */

function include_jquery(){
    wp_deregister_script('jquery'); // unloads script by this name

    wp_enqueue_script(
        'jquery',
        get_template_directory_uri() . '/js/jquery.3-3-1.min.js',
        '',
        1,
        true // footer y/n
    );
}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs(){
    wp_register_script(
        'bootstrap',
        get_template_directory_uri() . '/js/bootstrap.min.js',
        array(),
        false,
        true
    );
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'loadjs');

/**
 * 3.0
 * Wordpress menus
 */

add_theme_support('menus'); // enables support for wordpress menu's

function register_theme_menus()
{
    register_nav_menus( // adds menu locations, need to be referenced elsewhere
        array(
            'top-menu' => __('Top Menu', 'theme'),
            'footer-menu' => __('Footer Menu', 'theme'),
        )
    );
}
add_action( 'init', 'register_theme_menus' );
/**
 * 4.0
 * Post thumbnails
 */

add_theme_support('post-thumbnails'); // enables support for wordpress image nails

add_image_size(
    'smallest', // size name
    300, // X-pixel size
    300, // Y-pixel size
    true // y/n hard crop image to XY
);

// use "the_post_thumbnail_url('name_listed_here');" for a link in a <img> tag

add_image_size(
    'largest',
    800,
    800,
    true
);

add_image_size(
    'thumb',
    100,
    100,
    true
);
/**
 * 4.1
 * Notice on implementing the auto-crop after existing images are present
 *
 * to remedy such situations one has to download a plugin called:
 * 'force regenerate thumbnails' to recreate the image sizes listed above.
 *
 * recommended is to add the sizes before uploading any thumbnails and to not
 * change your mind afterwards.
 */

/**
 * 5.0
 * create costume post types
 */

function create_posttype() {
    register_post_type( 'vbsh_example_product',
        array(
            'labels' => array( // labels show up in the admin part
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'), // slug becomes part of the URL
        )
    );
}
add_action( 'init', 'create_posttype' );


// Register Custom Post Type
function custom_post_type() {
    // see: https://codex.wordpress.org/Function_Reference/register_post_type#Usage
    $labels = array( // labels show up on the admin side
        'name'                  => _x( 'Post Types', 'Post Type General Name', 'onceonatime' ),
        'singular_name'         => _x( 'Post Type', 'Post Type Singular Name', 'onceonatime' ),
        'menu_name'             => __( 'Post Types', 'onceonatime' ),
        'name_admin_bar'        => __( 'Post Type', 'onceonatime' ),
        'archives'              => __( 'Item Archives', 'onceonatime' ),
        'attributes'            => __( 'Item Attributes', 'onceonatime' ),
        'parent_item_colon'     => __( 'Parent Item:', 'onceonatime' ),
        'all_items'             => __( 'All Items', 'onceonatime' ),
        'add_new_item'          => __( 'Add New Item', 'onceonatime' ),
        'add_new'               => __( 'Add New', 'onceonatime' ),
        'new_item'              => __( 'New Item', 'onceonatime' ),
        'edit_item'             => __( 'Edit Item', 'onceonatime' ),
        'update_item'           => __( 'Update Item', 'onceonatime' ),
        'view_item'             => __( 'View Item', 'onceonatime' ),
        'view_items'            => __( 'View Items', 'onceonatime' ),
        'search_items'          => __( 'Search Item', 'onceonatime' ),
        'not_found'             => __( 'Not found', 'onceonatime' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'onceonatime' ),
        'featured_image'        => __( 'Featured Image', 'onceonatime' ),
        'set_featured_image'    => __( 'Set featured image', 'onceonatime' ),
        'remove_featured_image' => __( 'Remove featured image', 'onceonatime' ),
        'use_featured_image'    => __( 'Use as featured image', 'onceonatime' ),
        'insert_into_item'      => __( 'Insert into item', 'onceonatime' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'onceonatime' ),
        'items_list'            => __( 'Items list', 'onceonatime' ),
        'items_list_navigation' => __( 'Items list navigation', 'onceonatime' ),
        'filter_items_list'     => __( 'Filter items list', 'onceonatime' ),
    ); // 'onceonatime' or 'text_domain' from style.css

    $args = array(
        'label'                 => __( 'Post Type', 'onceonatime' ),
        'description'           => __( 'Post Type Description', 'onceonatime' ),
        'labels'                => $labels,
        'supports'              => false,
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'rewrite'               => array('slug' => 'custom-post-types'),
        'supports'              => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments'
        ),
    ); // slug becomes the URL, don't forget that "-" should be used instead of "_"

    register_post_type( 'post_type_vbs', $args );

}
add_action( 'init', 'custom_post_type', 0 ); // should be the same as the slug