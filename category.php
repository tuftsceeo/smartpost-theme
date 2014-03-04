<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $wp_query;
get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
            <header class="archive-header">
                <?php
                $cat_id = get_query_var('cat');
                if( current_user_can( 'edit_dashboard' ) ){
                    $cat_settings_link = '<div class="sp-settings-link-container"><span class="sp-settings-icon"><a href="' . admin_url('edit-tags.php?action=edit&taxonomy=category&tag_ID=' . $cat_id .'&post_type=post') . '" target="_blank" title="Edit this category" alt="Edit this category">Edit this category</a></span></div>';
                    if( defined( "SP_PLUGIN_NAME" ) && method_exists('sp_category', 'isSPCat') ){
                        if(sp_category::isSPCat( get_query_var('cat') ) ){
                            $cat_settings_link = '<div class="sp-settings-link-container"><span class="sp-settings-icon"><a href="' . admin_url('admin.php?page=smartpost&catID=' . $cat_id) . '" target="_blank" title="Edit this template" alt="Edit this template">Edit this template</a></span></div>';
                        }
                    }
                    echo $cat_settings_link;
                }
                ?>
                <h1 class="archive-title"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
                <?php if( defined( 'SP_PLUGIN_NAME' ) && method_exists('sp_core', 'sp_editor') && current_user_can( 'edit_dashboard' ) ) : ?>
                    <div class="archive-meta">
                        <div class="sp-cat-desc-editor">
                        <?php
                        echo sp_core::sp_editor(
                            category_description(),
                            null,
                            false,
                            'Add a category description ...',
                            array( 'data-action' => 'sp_save_cat_desc_ajax', 'data-catid' => get_query_var('cat') )
                        );
                        ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if ( category_description() ) : // Show an optional category description ?>
                        <div class="archive-meta">
                            <?php echo category_description(); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php get_sidebar( 'category' ); ?>
            </header><!-- .archive-header -->

		<?php if ( have_posts() ) : ?>
            <div class="the-posts">
                <?php $grid_checked = $wp_query->post_count > 1 ? 'checked="checked"' : '' ?>
                <?php $list_checked = $wp_query->post_count > 1 ? '' : 'checked="checked"' ?>
                <div id="post-view-format">
                    <input type="radio" id="post-view-grid" name="post-view-radio" value="grid" <?php echo $grid_checked ?>><label for="post-view-grid" class="grid-view-icon" title="View in grid format."></label>
                    <input type="radio" id="post-view-list" name="post-view-radio" value="list" <?php echo $list_checked ?> ><label for="post-view-list" class="list-view-icon" title="View in list format."></label>
                    <div class="clear"></div>
                </div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>
            </div><!-- .the-posts -->
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>