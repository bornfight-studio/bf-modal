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
 * @package           WP Modal Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       WP Modal Plugin
 * Plugin URI:        https://github.com/bornfight/wp-modal-plugin
 * Description:       Plugin for creating modals
 * Version:           1.0.3
 * Author:            Bornfight
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use Symfony\Component\Dotenv\Dotenv;
use wpModalPlugin\api\WPBFApiHelper;
use wpModalPlugin\api\WPBFRestApiCustomRoutes;
use wpModalPlugin\controller\WPBFPagesMetaBoxController;
use wpModalPlugin\core\WPBFDashboardSetup;
use wpModalPlugin\core\WPBFFrontend;
use wpModalPlugin\core\WPBFRewriteRules;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// URL Path
//define( 'PLUGIN_PREFIX_URL_PLUGIN_PATH', plugins_url( '/', __FILE__ ) );

define( 'WPBFMP_LOCAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPBFMP_PLUGIN_SLUG', 'wp-modal-plugin' );

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

$update_checker = Puc_v4_Factory::buildUpdateChecker( 'https://plugin-service.bwp.zone?identifier=' . WPBFMP_PLUGIN_SLUG . '&type=info', __FILE__, //Full path to the main plugin file or functions.php.
	WPBFMP_PLUGIN_SLUG );

add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( $_ENV['PLUGIN_PREFIX'] . 'admin-css', plugin_dir_url( __FILE__ ) . 'static/admin/dist/style.css' );
	wp_enqueue_script( $_ENV['PLUGIN_PREFIX'] . 'admin-js', plugin_dir_url( __FILE__ ) . 'static/admin/dist/bundle.js', null, '1.0.0', true );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( $_ENV['PLUGIN_PREFIX'] . 'public-css', plugin_dir_url( __FILE__ ) . 'static/public/dist/style.css' );
	wp_enqueue_script( $_ENV['PLUGIN_PREFIX'] . 'public-js', plugin_dir_url( __FILE__ ) . 'static/public/dist/bundle.js', null, '1.0.0', true );

	wp_localize_script( $_ENV['PLUGIN_PREFIX'] . 'public-js', 'wpbf_frontend_ajax_object', array(
		'ajax_url'       => get_home_url() . '/wp-json/api/v1',
		'populate_modal' => WPBFApiHelper::POPULATE_MODAL,
		'ajax_nonce'     => wp_create_nonce( 'wp_rest' )
	) );
} );

$wpbf_dashboard_setup = new WPBFDashboardSetup();
$wpbf_dashboard_setup->init();

$wpbf_rest_api_custom_routes = new WPBFRestApiCustomRoutes();
$wpbf_rest_api_custom_routes->register();

$wpbf_frontend = new WPBFFrontend();
$wpbf_frontend->init();

$wpbf_rewrite_rules = new WPBFRewriteRules();
$wpbf_rewrite_rules->register();

$wpbf_pages_meta_box_controller = new WPBFPagesMetaBoxController();
$wpbf_pages_meta_box_controller->init();
