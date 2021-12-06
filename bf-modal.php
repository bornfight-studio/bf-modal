<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           BF Modal
 *
 * @wordpress-plugin
 * Plugin Name:       BF Modal
 * Plugin URI:        https://github.com/bornfight/bf-modal
 * Description:       Plugin for creating modals
 * Version:           1.1.1
 * Author:            Bornfight
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

use bfModalPlugin\core\BFCore;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BFML_LOCAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'BFML_LOCAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BFML_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'BFML_PLUGIN_SLUG', 'bf-modal' );

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action( 'admin_notices', function () {
		?>
        <div class="notice notice-error">
            <h2>Missing <i>vendor/autoloader.php</i></h2>
            <p>
                <strong>
                    You are missing composer autoload. Please run <i>composer install</i> in root of your project.
                </strong>
            </p>
        </div>
		<?php
	} );

	return;
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/global-helper-functions.php';

$bf_core = new BFCore();
$bf_core->init();