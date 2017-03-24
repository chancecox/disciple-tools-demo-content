<?php

/**
 * Plugin Name: Disciple Tools - Sample Data
 * Plugin URI: https://github.com/ChasmSolutions/disciple-tools-sample-data
 * Description: Sample Data for Disciple Tools. This plugin provides instant contacts, groups, users, and content to assist in rapid launch for training or demonstration.
 * Version: 0.1
 * Author: Chasm.Solutions & Kingdom.Training
 * Author URI: https://github.com/ChasmSolutions
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Singleton class for setting up the plugin.
 *
 * @since  0.1
 * @access portal
 */
class dt_sample_data {

    /**
     * The token.
     * @var     string
     * @access  portal
     * @since   0.1
     */
    public $token;
    public $setup_info;
    public $add_report;
    /**
     * The version number.
     * @var     string
     * @access  portal
     * @since   0.1
     */
    public $version;
    /**
     * The admin object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $admin;
    /**
     * The settings object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $settings;
    /**
     * The contacts object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $contacts;
    /**
     * The groups object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $groups;
    /**
     * The users object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $users;
    /**
     * The settings object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $page;
    /**
     * The settings object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $classes;
    /**
     * The generations class object.
     * @var     object
     * @access  portal
     * @since   0.1
     */
    public $generations;
    /**
     * Plugin directory path.
     *
     * @since  0.1
     * @access portal
     * @var    string
     */
    public $dir_path = '';

    /**
     * Plugin directory URI.
     *
     * @since  0.1
     * @access portal
     * @var    string
     */
    public $dir_uri = '';

    /**
     * Plugin image directory URI.
     *
     * @since  0.1
     * @access portal
     * @var    string
     */
    public $img_uri = '';

    /**
     * Returns the instance.
     *
     * @since  0.1
     * @access portal
     * @return object
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new dt_sample_data;
            $instance->setup();
            $instance->includes();
            $instance->setup_actions();
        }
        return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  0.1
     * @access private
     * @return void
     */
    private function __construct() {

    }

    /**
     * Magic method to output a string if trying to use the object as a string.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    public function __toString() {
        return 'dtsample';
    }

    /**
     * Magic method to keep the object from being cloned.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Whoah, partner!', 'dtsample' ), '0.1' );
    }

    /**
     * Magic method to keep the object from being unserialized.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Whoah, partner!', 'dtsample' ), '0.1' );
    }

    /**
     * Magic method to prevent a fatal error when calling a method that doesn't exist.
     *
     * @since  0.1
     * @access portal
     * @return null
     */
    public function __call( $method = '', $args = array() ) {
        _doing_it_wrong( "dt_sample_data::{$method}", esc_html__( 'Method does not exist.', 'dtsample' ), '0.1' );
        unset( $method, $args );
        return null;
    }

    /**
     * Sets up globals.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    private function setup() {

        // Main plugin directory path and URI.
        $this->dir_path     = trailingslashit( plugin_dir_path( __FILE__ ) );
        $this->dir_uri      = trailingslashit( plugin_dir_url(  __FILE__ ) );

        // Plugin directory paths.
        $this->classes      = trailingslashit( $this->dir_path . 'classes' );

        // Plugin directory URIs.
        $this->img_uri      = trailingslashit( $this->dir_uri . 'img' );

        // Admin and settings variables
        $this->token 			= 'dtsample';
        $this->version 			= '0.1';
    }

    /**
     * Loads files needed by the plugin.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    private function includes() {

       // Load admin files.
        if ( is_admin() ) {

            // General functions.
            require_once('classes/class-sample-contacts.php');
            $this->contacts = dt_sample_contacts::instance();

            require_once('classes/class-sample-groups.php');
            $this->groups = dt_sample_groups::instance();

            require_once('classes/class-sample-users.php');
            $this->users = dt_sample_users::instance();

            require_once('classes/class-sample-menu.php');
            $this->page = dt_sample_page::instance();

            require_once('classes/class-p2p-generations.php');
            $this->generations = dt_p2p_generations::instance();

            require_once( 'classes/config-theme-content.php' );
            $this->content = dt_theme_content::instance();

            if ( class_exists('Disciple_Tools')) {
                require_once( 'classes/class-sample-roles.php' );
                $this->roles = dt_sample_roles::instance();
            }

            require_once ('classes/class-sample-menu-setup-info.php');
            $this->setup_info = dt_sample_setup_info::instance();

            require_once ('classes/class-sample-menu-add-records.php');
            $this->add_records = dt_sample_add_records::instance();

            require_once ('classes/class-sample-add-report.php');
            $this->add_report = dt_sample_add_report::instance();
        }
    }

    /**
     * Sets up main plugin actions and filters.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    private function setup_actions() {

        // Internationalize the text strings used.
        add_action( 'plugins_loaded', array( $this, 'i18n' ), 2 );

        // Register activation hook.
        register_activation_hook( __FILE__, array( $this, 'activation' ) );
    }

    /**
     * Loads the translation files.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    public function i18n() {
        load_plugin_textdomain( 'dtsample', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ). 'languages' );
    }

    /**
     * Method that runs only when the plugin is activated.
     *
     * @since  0.1
     * @access portal
     * @return void
     */
    public function activation() {

    }
}

/**
 * Gets the instance of the `dt_sample_data` class.  This function is useful for quickly grabbing data
 * used throughout the plugin.
 *
 * @since  0.1
 * @access portal
 * @return object
 */
function dt_sample_data_plugin() {
    return dt_sample_data::get_instance();
}

// Let's roll!
add_action( 'plugins_loaded', 'dt_sample_data_plugin' );


