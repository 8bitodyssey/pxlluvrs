<?php
/**
 * template file 4 Front Page.
 *
 * This overrides index.php on front page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pxlluvrs
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<?php do_action( 'pxl_before_primary' ); ?>
		<main id="main" class="site-main row" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-front' );
				?>

			<?php endwhile; ?>

			<?php pxl_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php do_action( 'pxl_after_primary' ); ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
