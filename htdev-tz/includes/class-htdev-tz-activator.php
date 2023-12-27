<?php

/**
 * Fired during plugin activation
 *
 * @link       https://rrdev.ru
 * @since      1.0.0
 *
 * @package    Htdev_Tz
 * @subpackage Htdev_Tz/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Htdev_Tz
 * @subpackage Htdev_Tz/includes
 * @author     Ivan P. Kolotilkin <logic@xaker.ru>
 */
class Htdev_Tz_Activator {

        /**
         * Short Description. (use period)
         *
         * Long Description.
         *
         * @since    1.0.0
         */
        public static function activate() {
                /**
                 * This only required if custom post type has rewrite!
                 */
                flush_rewrite_rules();

        }

}