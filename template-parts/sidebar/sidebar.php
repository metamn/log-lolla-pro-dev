<?php
/**
 * Displays the sidebar
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<section id="sidebar" class="sidebar">
	<h3 class="sidebar-title">Sidebar</h3>

	<section class="sidebar-widget-list">
		<h3 class="widget-list-title">Widget list</h3>

		<div class="widget-list-items">
			<?php get_sidebar(); ?>
		</div>
	</section>
</section>
