<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
    <?php $grid_view = !is_single() ? 'grid-view' : ''; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( array( $grid_view ) ); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>

        <header class="entry-header">
            <?php if ( is_single() ) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php else : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
            <?php endif; // is_single() ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php if ( !is_single() && has_post_thumbnail( get_the_ID() ) ) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200, 150), array( 'class' => 'featured-img' ) ); ?></a>
            <?php endif; ?>
            <?php if( is_single() ) : ?>
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            <?php else: ?>
                <?php the_excerpt() ?>
            <?php endif; ?>
            <div class="clear"></div>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
            <?php twentytwelve_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
        <div class="clear"></div>
	</article><!-- #post -->
