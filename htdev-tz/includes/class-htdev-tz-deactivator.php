<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://rrdev.ru
 * @since      1.0.0
 *
 * @package    Htdev_Tz
 * @subpackage Htdev_Tz/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Htdev_Tz
 * @subpackage Htdev_Tz/includes
 * @author     Ivan P. Kolotilkin <logic@xaker.ru>
 */
class Htdev_Tz_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        /**
         * This only required if custom post type has rewrite!
         */
    	 flush_rewrite_rules();

	}

}