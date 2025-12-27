<?php
/**
 * The template for displaying pages
 */

get_header();
?>

<main id="primary" class="site-main techsup-content">
    <div class="techsup-container">
        <div class="techsup-grid <?php echo techsup_has_sidebar() ? 'has-sidebar' : ''; ?>">
            
            <div class="content-area">
                <?php techsup_before_content(); ?>
                
                <?php
                while ( have_posts() ) :
                    the_post();
                    
                    // Display page content
                    get_template_part( 'template-parts/content', 'page' );
                    
                    // Comments on pages (if enabled)
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    
                endwhile;
                ?>
                
                <?php techsup_after_content(); ?>
            </div>
            
            <?php
            if ( techsup_has_sidebar() ) {
                get_sidebar();
            }
            ?>
            
        </div>
    </div>
</main>

<?php
get_footer();