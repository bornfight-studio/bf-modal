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
 * Version:           1.0.11
 * Author:            Bornfight
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

use Symfony\Component\Dotenv\Dotenv;
use bfModalPlugin\api\BFApiHelper;
use bfModalPlugin\api\BFRestApiCustomRoutes;
use bfModalPlugin\core\BFConstants;
use bfModalPlugin\core\BFDashboardSetup;
use bfModalPlugin\core\BFFrontend;
use bfModalPlugin\core\BFRewriteRules;
use bfModalPlugin\providers\BFPagesMetaBoxProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BFML_LOCAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
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

// Load environment variables
if ( file_exists( plugin_dir_path( __FILE__ ) . '.env' ) ) {
	( new Dotenv() )->load( plugin_dir_path( __FILE__ ) . '.env' );
}

add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( $_ENV['PLUGIN_PREFIX'] . 'bfml_admin-css', plugin_dir_url( __FILE__ ) . 'static/admin/dist/style.css', null, '1.0.1', false );
	wp_enqueue_script( $_ENV['PLUGIN_PREFIX'] . 'bfml_admin-js', plugin_dir_url( __FILE__ ) . 'static/admin/dist/bundle.js', null, '1.0.1', true );
} );

add_action( 'wp_enqueue_scripts', function () {
	if ( empty( get_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ) ) ) {
		wp_enqueue_style( $_ENV['PLUGIN_PREFIX'] . 'public-css', plugin_dir_url( __FILE__ ) . 'static/public/dist/style.css', null, '1.0.1', false );
	}
	wp_enqueue_script( $_ENV['PLUGIN_PREFIX'] . 'public-js', plugin_dir_url( __FILE__ ) . 'static/public/dist/bundle.js', null, '1.0.1', true );

	wp_localize_script( $_ENV['PLUGIN_PREFIX'] . 'public-js', 'bf_frontend_ajax_object', array(
		'ajax_url'       => get_rest_url() . 'api/v1',
		'populate_modal' => BFApiHelper::POPULATE_MODAL,
		'ajax_nonce'     => wp_create_nonce( 'wp_rest' )
	) );
} );

$bf_dashboard_setup = new BFDashboardSetup();
$bf_dashboard_setup->init();

$bf_rest_api_custom_routes = new BFRestApiCustomRoutes();
$bf_rest_api_custom_routes->register();

$bf_frontend = new BFFrontend();
$bf_frontend->init();

$bf_rewrite_rules = new BFRewriteRules();
$bf_rewrite_rules->register();

$bf_pages_meta_box_provider = new BFPagesMetaBoxProvider();
$bf_pages_meta_box_provider->init();
