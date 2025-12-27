<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e( 'Skip to content', 'techsup-theme' ); ?>
    </a>

    <?php 
    // Logic: Check if Header is Disabled
    $disable_header = is_singular() ? get_post_meta( get_the_ID(), '_techsup_disable_header', true ) : false;
    
    if ( ! $disable_header ) {
        techsup_before_header(); 
        ?>
        <header id="masthead" class="site-header">
            <?php techsup_header(); // The Main Header Content (Logo/Nav) ?>
        </header>
        <?php 
        techsup_after_header(); // Good place for Hero Sections
    }
    ?>

    <div id="content" class="site-content">