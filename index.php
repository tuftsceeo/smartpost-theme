<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $wp_query;
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
            <div class="the-posts">
                <?php $grid_checked = $wp_query->post_count > 1 ? 'checked="checked"' : '' ?>
                <?php $list_checked = $wp_query->post_count > 1 ? '' : 'checked="checked"' ?>
                <div id="post-view-format">
                    <input type="radio" id="post-view-grid" name="post-view-radio" value="grid" <?php echo $grid_checked ?>><label for="post-view-grid" class="grid-view-icon" title="View in grid format."></label>
                    <input type="radio" id="post-view-list" name="post-view-radio" value="list" <?php echo $list_checked ?> ><label for="post-view-list" class="list-view-icon" title="View in list format."></label>
                    <div class="clear"></div>
                </div>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>

                <?php twentytwelve_content_nav( 'nav-below' ); ?>
            </div><!-- end .the-psots -->

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Stay tuned!', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Stay Tuned!', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found.', 'twentytwelve' ); ?></p>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>