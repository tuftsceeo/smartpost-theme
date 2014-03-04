<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php if ( current_user_can('edit_dashboard') ): ?>
                    <a href="<?php echo admin_url('widgets.php') ?>" title="Edit this sidebar" alt="Edit this sidebar">
                        <span class="edit-sidebar">Edit sidebar </span>
                    </a>
            <?php endif; ?>
		</div><!-- #secondary -->
	<?php endif; ?>