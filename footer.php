</main>

<footer class="site-footer">

    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="footer-widgets">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
    <?php endif; ?>

    <p class="footer-copyright">
        &copy; <?php echo date( 'Y' ); ?>
        <?php bloginfo( 'name' ); ?>
    </p>
</footer>

<?php wp_footer(); ?>
</body>
</html>