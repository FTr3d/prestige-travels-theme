<?php
/**
 * Prestige Travels Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. Theme Setup
function prestige_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    
    // Register Nav
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'prestige-travels' ),
        'footer'  => __( 'Footer Menu', 'prestige-travels' )
    ));
}
add_action( 'after_setup_theme', 'prestige_theme_setup' );

// 2. Enqueue Assets
function prestige_enqueue_scripts() {
    wp_enqueue_style( 'prestige-style', get_stylesheet_uri(), array(), '1.4' );
    wp_enqueue_script( 'prestige-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.4', true );
}
add_action( 'wp_enqueue_scripts', 'prestige_enqueue_scripts' );

// 3. Register Custom Post Types (Destinations, Itineraries, FAQs)
function prestige_register_cpts() {
    // Destinations
    register_post_type( 'destination', array(
        'labels' => array( 'name' => 'Destinations', 'singular_name' => 'Destination' ),
        'public' => true, 'has_archive' => false, 'supports' => array( 'title', 'editor', 'thumbnail' ), 'menu_icon' => 'dashicons-location',
    ));
    
    // Itineraries
    register_post_type( 'itinerary', array(
        'labels' => array( 'name' => 'Itineraries', 'singular_name' => 'Itinerary' ),
        'public' => true, 'has_archive' => true, 'supports' => array( 'title', 'editor', 'thumbnail' ), 'menu_icon' => 'dashicons-palmtree',
    ));
    
    // FAQs
    register_post_type( 'faq', array(
        'labels' => array( 'name' => 'FAQs', 'singular_name' => 'FAQ' ),
        'public' => true, 'exclude_from_search' => true, 'publicly_queryable' => false, 'supports' => array( 'title', 'editor' ), 'menu_icon' => 'dashicons-editor-help',
    ));
}
add_action( 'init', 'prestige_register_cpts' );

// 4. ACF Options Page for Site Settings
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// 5. Helper function: Tier Mapping (v1.4 Overrides)
function prestige_get_tier_info($raw_tier) {
    $raw = strtolower(trim($raw_tier));
    if ($raw === 'good')   return array('label' => 'CURATED',  'class' => 'tier-curated');
    if ($raw === 'better') return array('label' => 'PREMIER',  'class' => 'tier-premier');
    if ($raw === 'best')   return array('label' => 'PRESTIGE', 'class' => 'tier-prestige');
    return array('label' => esc_html($raw_tier), 'class' => 'tier-curated'); // fallback
}
