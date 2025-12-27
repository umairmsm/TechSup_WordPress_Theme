</div><?php 
    // Logic: Check if Footer is Disabled
    $disable_footer = is_singular() ? get_post_meta( get_the_ID(), '_techsup_disable_footer', true ) : false;
    
    if ( ! $disable_footer ) {
        techsup_before_footer(); // Good place for CTAs
        ?>
        <footer id="colophon" class="site-footer">
            <?php techsup_footer(); // Copyright / Widgets ?>
        </footer>
        <?php 
        techsup_after_footer(); // Scripts
    }
    ?>

</div><?php wp_footer(); ?>

</body>
</html>