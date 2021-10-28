<?php
/**
 *
 * @var array $args
 *
 */

$tab = ! empty( $args['tab'] ) ? $args['tab'] : '';
?>
<nav class="nav-tab-wrapper">
    <a href="?page=<?php echo BFML_PLUGIN_SLUG; ?>"
       class="nav-tab <?php echo empty( $tab ) ? 'nav-tab-active' : ''; ?>">BF Modal Settings</a>
    <a href="?page=<?php echo BFML_PLUGIN_SLUG; ?>&tab=other-options"
       class="nav-tab <?php echo $tab === 'other-options' ? 'nav-tab-active' : ''; ?>">Other Options</a>
</nav>
