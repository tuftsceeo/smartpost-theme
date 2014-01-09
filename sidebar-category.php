<?php
/**
 * Created by PhpStorm.
 * User: ryagudin
 * Date: 12/16/13
 * Time: 10:32 AM
 * @package WordPress
 * @subpackage SmartPost Theme
 * @since SmartPost Theme 1.0
 *
 * The "sidebar" containing the widget area in each category header area.
 */
?>

<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
    <div class="widget-cat-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div><!-- #secondary -->
<?php endif; ?>