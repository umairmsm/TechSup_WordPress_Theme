<?php
/**
 * TechSup Theme Engine
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Define Constants
define( 'TECHSUP_VERSION', '2.0.0' );
define( 'TECHSUP_DIR', get_template_directory() );
define( 'TECHSUP_URI', get_template_directory_uri() );

// Modular Loader
$techsup_includes = array(
    '/inc/hooks.php',         // 1. The Event Bus
    '/inc/performance.php',   // 2. Speed Tweaks
    '/inc/template-tags.php', // 3. Helper Logic
    '/inc/customizer.php',    // 4. Visual Engine (Fonts/Colors)
    '/inc/layout-meta.php',   // 5. Layout Controls (Metabox)
    '/inc/elements.php',      // 6. Block Injection (The Elementor Killer)
);

foreach ( $techsup_includes as $file ) {
    $filepath = TECHSUP_DIR . $file;
    if ( file_exists( $filepath ) ) {
        require_once $filepath;
    }
}

// Basic Theme Setup
add_action( 'after_setup_theme', 'techsup_setup' );
function techsup_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'align-wide' ); // Gutenberg wide support
    
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'techsup-theme' ),
    ) );
}

// Sidebar Registration
add_action( 'widgets_init', 'techsup_widgets_init' );
function techsup_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'techsup-theme' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

// Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'techsup_scripts' );
function techsup_scripts() {
    wp_enqueue_style( 'techsup-style', get_stylesheet_uri(), array(), TECHSUP_VERSION );
    
    // Only load navigation JS if menu exists
    if ( has_nav_menu( 'primary' ) ) {
        wp_enqueue_script( 'techsup-nav', TECHSUP_URI . '/assets/js/navigation.js', array(), TECHSUP_VERSION, true );
    }
}