<?php
/**
* Plugin Name:     AO FAQ
* Description:     Create FAQ custom post type
* version:         1.0.0
* Author:          Udhayakumar Sadagopan
* Author URI:      http://www.udhayakumars.com
**/


if( ! defined( 'FAQ_VERSION' ) ) {
    define( 'FAQ_VERSION', 1.0 );
} // end if

class Faq {


        /* --------------------------------------------
         * Attributes
         -------------------------------------------- */

       // Represents the nonce value used to save the post media
         private $nonce = 'wp_faq_nonce';
         private $singular_label = "FAQ";
         private $plural_label = "FAQs";


        /* --------------------------------------------
         * Constructor
         -------------------------------------------- */

         /**
          * Initializes localiztion, sets up JavaScript, and displays the meta box for saving the file
          * information.
          */
         public function __construct() {

            // Setup the meta box hooks
        add_action( 'init', array($this, 'create_cpt') );

         } // end construct

        /* --------------------------------------------
         * Localization, Styles, and JavaScript
         -------------------------------------------- */


        /* --------------------------------------------
         * Hooks
         -------------------------------------------- */

        /**
         * Introduces the file meta box for uploading the file to this post.
         */
        public function create_cpt() {

        $theme = "estpal";
        // Set UI labels for Custom Post Type
        $labels = array(
                'name'                => _x($this->plural_label, 'Post Type General Name', $theme),
                'singular_name'       => _x($this->singular_label, 'Post Type Singular Name', $theme),
                'menu_name'           => __($this->plural_label, $theme),
                'parent_item_colon'   => __('Parent '.$this->singular_label, $theme),
                'all_items'           => __('All '.$this->plural_label, $theme),
                'view_item'           => __('View '.$this->singular_label, $theme),
                'add_new_item'        => __('Add New '.$this->singular_label, $theme),
                'add_new'             => __('Add New', $theme),
                'edit_item'           => __('Edit '.$this->singular_label, $theme),
                'update_item'         => __('Update '.$this->singular_label, $theme),
                'search_items'        => __('Search '.$this->singular_label, $theme),
                'not_found'           => __('Not Found', $theme),
                'not_found_in_trash'  => __('Not found in Trash', $theme),
            );

        // Set other options for Custom Post Type

        $args = array(
                'label'               => __('faqs', $theme),
                'description'         => __('List of '.$this->plural_label, $theme),
                'labels'              => $labels,
                // Testimonials this CPT supports in Post Editor
                'supports'            => array('title', 'revisions'),
                /* A hierarchical CPT is like Pages and can have
                * Parent and child items. A non-hierarchical CPT
                * is like Posts.
                */
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 7,
                'menu_icon'           => 'dashicons-admin-page',
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
            );

        // Registering your Custom Post Type
        register_post_type('faqs', $args);

        } // add_file_meta_box

    } // add_file_meta_box

}

$GLOBALS['faq'] = new Faq();
