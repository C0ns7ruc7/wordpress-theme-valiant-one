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
    wp_enqueue_style('bootstrap'); // add to que

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

register_nav_menus( // adds menu locations, need to be referenced elsewhere
    array(
        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
    )
);

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