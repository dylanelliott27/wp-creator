<?php
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function load_styles(){
    wp_enqueue_style( 'style', get_stylesheet_uri( ));
    wp_enqueue_style('bootstrap5css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js');
}

add_action( 'wp_enqueue_scripts', 'load_styles' );

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

register_nav_menus(
    array(
    'primary-menu' => __( 'Primary Menu' ),
    'secondary-menu' => __( 'Secondary Menu' )
    )
);


require_once get_template_directory() . '/bootstrap_5_wordpress_navbar_walker.php';




?>