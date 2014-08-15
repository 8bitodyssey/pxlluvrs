<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package pxlluvrs
 */
?>

		<?php do_action( 'pxl_after_content' ); ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action( 'pxl_before_footer' ); ?>
		<div class="site-info">
			<?php do_action( 'pxl_footer' ); ?>
		</div><!-- .site-info -->
		<?php do_action( 'pxl_after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php do_action( 'pxl_after_body' ); ?>
</body>
</html>
