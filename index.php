<?php
get_header();
?>

<main id="primary" class="site-main techsup-content">
    <div class="techsup-container">
        <div class="techsup-grid <?php echo techsup_has_sidebar() ? 'has-sidebar' : ''; ?>">
            
            <div class="content-area">
                <?php techsup_before_content(); ?>
                
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        // Load 'template-parts/content.php'
                        get_template_part( 'template-parts/content', get_post_type() );
                    endwhile;
                    
                    the_posts_pagination();
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
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