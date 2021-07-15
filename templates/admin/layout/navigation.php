<?php
/**
 *
 * @var string $tab
 *
 */
?>
<nav class="nav-tab-wrapper">
	<a href="?page=<?= WPBFMP_PLUGIN_SLUG; ?>"
	   class="nav-tab <?= empty( $tab ) ? 'nav-tab-active' : ''; ?>">WP Modal Settings</a>
	<a href="?page=<?= WPBFMP_PLUGIN_SLUG; ?>&tab=other-plugins"
	   class="nav-tab <?= $tab === 'other-plugins' ? 'nav-tab-active' : ''; ?>">Other Plugins</a>
</nav>
