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

	// we need that to size widgets inside
	<section class="widget-list">
		<h3 class="widget-list">Widget list</h3>

		<div class="widget-list">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
