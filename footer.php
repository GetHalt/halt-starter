<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package StagFramework
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'chc' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'chc' ); ?>"><?php printf( __( 'Proudly powered by %s', 'chc' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


</div><!-- #page -->
	
<?php wp_footer(); ?>

</body>
</html>
