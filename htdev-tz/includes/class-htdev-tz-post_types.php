<?php

/**
 * Register custom post type
 *
 * @link       https://rrdev.ru
 * @since      1.0.0
 *
 * @package    htdev_tz
 * @subpackage htdev_tz/includes
 */
class Htdev_Tz_Post_Types {

    /**
     * Create post types
     */
    public function create_custom_post_type() {

        /**
         * This is not all the fields, only what I find important. Feel free to change this function ;)
         *
         * @link https://codex.wordpress.org/Function_Reference/register_post_type
         */
    

        $taxonomy_labels = array(
            'name'              => _x( 'Htdev', 'taxonomy general name' ),
            'singular_name'     => _x( 'Htdev', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Htdev' ),
            'all_items'         => __( 'All Htdev' ),
            'parent_item'       => __( 'Parent Htdev' ),
            'parent_item_colon' => __( 'Parent Htdev:' ),
            'edit_item'         => __( 'Edit Htdev' ),
            'update_item'       => __( 'Update Htdev' ),
            'add_new_item'      => __( 'Add New Htdev' ),
            'new_item_name'     => __( 'New Htdev Name' ),
            'menu_name'         => __( 'Htdev' ),
        );
        $taxonomy_args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $taxonomy_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'Htdev' ],
        );
        register_taxonomy( 'Htdev', [ 'post' ], $taxonomy_args );

        $post_args = array(
            'public' => true,
            'label'  => 'My Htdev',
            'rewrite' => array('slug' => 'my-htdevs'),
            'supports' => array('title', 'editor')
        );
        register_post_type('htdev_demo', $post_args);

    }

}