<?php
/**
 * @package pxlluvrs
 */
   $pxl_added_post_classes = array (
																	'small-12',
																	'large-4',
																	'columns',
					);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $pxl_added_post_classes ); ?>>
	<div class="entry-box">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<header class="entry-header">
				<?php do_action( 'pxl_before_entry_header' ); ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php pxl_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php do_action( 'pxl_after_entry_header' ); ?>
			</header><!-- .entry-header -->

			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
				<?php do_action( 'pxl_before_entry_content' ); ?>
				<?php the_excerpt(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'pxl' ),
						'after'  => '</div>',
					) );
				?>
				<?php do_action( 'pxl_after_entry_content' ); ?>
			</div><!-- .entry-content -->
			<?php endif; ?>

			<footer class="entry-footer">
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'pxl' ) );
						if ( $categories_list && pxl_categorized_blog() ) :
					?>
					<span class="cat-links">
						<?php printf( __( 'Posted in %1$s', 'pxl' ), $categories_list ); ?>
					</span>
					<?php endif; // End if categories ?>

					<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', __( ', ', 'pxl' ) );
						if ( $tags_list ) :
					?>
					<span class="tags-links">
						<?php printf( __( 'Tagged %1$s', 'pxl' ), $tags_list ); ?>
					</span>
					<?php endif; // End if $tags_list ?>
				<?php endif; // End if 'post' == get_post_type() ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pxl' ), __( '1 Comment', 'pxl' ), __( '% Comments', 'pxl' ) ); ?></span>
				<?php endif; ?>

				<?php edit_post_link( __( 'Edit', 'pxl' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</a>
	</div><!-- .entry-box -->
</article><!-- #post-## -->
