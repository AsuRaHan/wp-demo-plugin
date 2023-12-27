<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rrdev.ru
 * @since             1.0.0
 * @package           htdev-tz
 *
 * @wordpress-plugin
 * Plugin Name:       ТЗ для ХайТэк Девелопмент Групп
 * Plugin URI:        https://rrdev.ru/wp-plugin/htdev-tz/
 * Description:       Плагин написан как тестовое задание для ХайТэк Девелопмент Групп
 * Version:           1.0.0
 * Author:            Ivan P. Kolotilkin
 * Author URI:        https://rrdev.ru/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       htdev-tz
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'HTDEV_TZ_PLUGIN_NAME', 'htdev-tz' );
define( 'HTDEV_TZ_VERSION', '1.0.0' );
define( 'HTDEV_TZ_URL', plugin_dir_url( __FILE__ ) );
define( 'HTDEV_TZ_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Store plugin base dir, for easier access later from other classes.
 * (eg. Include, pubic or admin)
 */
define( 'HTDEV_TZ_BASE_DIR', plugin_dir_path( __FILE__ ) );

/********************************************
* RUN CODE ON PLUGIN UPGRADE AND ADMIN NOTICE
*
* @tutorial run_code_on_plugin_upgrade_and_admin_notice.php
*/
define( 'HTDEV_TZ_BASE_NAME', plugin_basename( __FILE__ ) );
// RUN CODE ON PLUGIN UPGRADE AND ADMIN NOTICE

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-htdev-tz-activator.php
 */
function activate_Htdev_Tz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-htdev-tz-activator.php';
	Htdev_Tz_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-htdev-tz-deactivator.php
 */
function deactivate_Htdev_Tz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-htdev-tz-deactivator.php';
	Htdev_Tz_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Htdev_Tz' );
register_deactivation_hook( __FILE__, 'deactivate_Htdev_Tz' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-htdev-tz.php';

global $Htdev_Tz;
$Htdev_Tz = new Htdev_Tz();
$Htdev_Tz->run();
// END THIS ALLOW YOU TO ACCESS YOUR PLUGIN CLASS