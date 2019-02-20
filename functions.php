<?php

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
        true // footer y/n
    );
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'loadjs');

