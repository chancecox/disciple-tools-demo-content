<?php

/**
 * dmm_crm_sample_page class for the admin page
 *
 * @class dmm_crm_sample_page
 * @version	1.0.0
 * @since 1.0.0
 * @package	DmmCrm_Plugin
 * @author Chasm.Solutions & Kingdom.Training
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class dmm_crm_sample_page {

    /**
     * dmm_crm_sample_page The single instance of dmm_crm_sample_page.
     * @var 	object
     * @access  private
     * @since 	1.0.0
     */
    private static $_instance = null;

    /**
     * dmm_crm_sample_page Instance
     *
     * Ensures only one instance of dmm_crm_sample_page is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return dmm_crm_sample_page instance
     */
    public static function instance () {
        if ( is_null( self::$_instance ) )
            self::$_instance = new self();
        return self::$_instance;
    } // End instance()

    /**
     * Constructor function.
     * @access  public
     * @since   1.0.0
     */
    public function __construct () {

        add_action("admin_menu", array($this, "add_dmmcrmsample_data_menu") );

    } // End __construct()



    public function add_dmmcrmsample_data_menu () {
        add_submenu_page( 'options-general.php', __( 'DMM Sample Data', 'dmmcrmsample' ), __( 'DMM Sample Data', 'dmmcrmsample' ), 'manage_options', 'dmmcrmsample', array( $this, 'dmmcrmsample_data_page' ) );
    }

    public function dmmcrmsample_data_page() {

        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        /**
         *
         * Begin Header & Tab Bar
         */

        if (isset($_GET["tab"])) {$tab = $_GET["tab"];} else {$tab = 'dash';}

        $tab_link_pre = '<a href="options-general.php?page=dmmcrmsample&tab=';
        $tab_link_post = '" class="nav-tab ';

        $html = '<div class="wrap">
            <h2>DMM CRM SAMPLE DATA</h2>
            <h2 class="nav-tab-wrapper">';

        $html .= $tab_link_pre . 'dash' . $tab_link_post;
        if ($tab == 'dash' || !isset($tab)) {$html .= 'nav-tab-active';}
        $html .= '">Dashboard</a>';

        $html .= $tab_link_pre . 'records' . $tab_link_post;
        if ($tab == 'records') {$html .= 'nav-tab-active';}
        $html .= '">Add Records</a>';

        $html .= $tab_link_pre . 'tools' . $tab_link_post;
        if ($tab == 'tools') {$html .= 'nav-tab-active';}
        $html .= '">Tools</a>';



        $html .= '</h2>';
        // End Tab Bar

        /**
         *
         * Begin Page Content
         */
        switch ($tab) {
            case "records":
//                    $html .= $this->dmmcrmsample_run_dashboard() ;
                break;
            case "tools":
//                    $html .= dmm_crm_2_column_placeholder ();
                break;
            default:
                    $html .= $this->dmmcrmsample_run_dashboard() ;
        }

        $html .= '</div>'; // end div class wrap

        echo $html;

    }

    public function dmmcrmsample_run_dashboard () {
        global $wpdb;
        $html ='';

        // Build SQL query data
        $user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" );
        $active_contacts_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'contacts' AND post_status = 'publish'" );
        $active_groups_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'groups' AND post_status = 'publish'" );

        $contacts_in_groups = $wpdb->get_var( "SELECT COUNT(*) FROM wp_p2p WHERE p2p_type = 'contacts_to_groups'" );

        // Build Report for Dashboard
        $html .= '<div class="wrap"><h2>Stats</h2>';
        $html .= '<table class="widefat "><thead><th>Name</th><th>Count</th><th>Description</th></thead><tbody>';

        $html .= '<tr><th>Contacts </th><td>'. $active_contacts_count . '</td><td></td></tr>';
        $html .= '<tr><th>Groups </th><td>'. $active_groups_count . '</td><td></td></tr>';
        $html .= '<tr><th>Users</th><td>'. $user_count . '</td><td></td></tr>';
        $html .= '<tr><th>Contacts in Groups</th><td>'. $contacts_in_groups . '</td><td>These are contacts of all kinds attending, planting, or coaching a group.</td></tr>';
        $html .= '<tr><th>Churches</th><td></td><td></td></tr>';
        $html .= '<tr><th>DBS groups</th><td></td><td></td></tr>';
        $html .= '<tr><th>Baptisms</th><td></td><td></td></tr>';
        $html .= '<tr><th>Baptizers</th><td></td><td></td></tr>';
        $html .= '<tr><th>Church Planters</th><td></td><td></td></tr>';
        $html .= '<tr><th>1st Generation Believers</th><td></td><td></td></tr>';
        $html .= '<tr><th>2nd Generation Believers</th><td></td><td></td></tr>';
        $html .= '<tr><th>3rd Generation Believers</th><td></td><td></td></tr>';
        $html .= '<tr><th>4th Generation Believers</th><td></td><td></td></tr>';
        $html .= '<tr><th>5th+ Generation Believers</th><td></td><td></td></tr>';
        $html .= '<tr><th>1st Generation Church</th><td></td><td></td></tr>';
        $html .= '<tr><th>2nd Generation Church</th><td></td><td></td></tr>';
        $html .= '<tr><th>3rd Generation Church</th><td></td><td></td></tr>';
        $html .= '<tr><th>4th Generation Church</th><td></td><td></td></tr>';
        $html .= '<tr><th>Prayer Supporters</th><td></td><td></td></tr>';
        $html .= '<tr><th>Project Supporters</th><td></td><td></td></tr>';
        $html .= '<tr><th>Multipliers (Coalition)</th><td></td><td></td></tr>';
        $html .= '<tr><th>Marketers</th><td></td><td></td></tr>';
        $html .= '<tr><th>Dispatchers</th><td></td><td></td></tr>';
        $html .= '<tr><th>Prayers Network</th><td></td><td></td></tr>';
        $html .= '<tr><th>City/State Districts</th><td></td><td></td></tr>';



        $html .= '</tbody></table>';

        $html .= '';

        return $html;
    }

    public function dmmcrmsample_add_contacts()
    {

        if (get_option('add_sample_contacts') !== '1') {

            echo '<div class="wrap">';
            echo '<h1>Add Sample Contacts</h1><p>';

            $contacts = array();

            $contacts = array(
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Buthaynah Wasim", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Bari Waql", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Aysha Rasha", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Poke", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Aziza Rasha", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Dalia Melek", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fadil Eisa", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fadilah Talitha", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Faris", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fatin Tarique", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mahir Mohammed", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Majida", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Maysa Azzam", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Parah", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohamad", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Mudawar", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Tunisia", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mukhtar", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Musad Dawud", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Qaseem Maysun", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rahi Atiya", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rashid Manal", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahir", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahu Fatima", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tarik", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Usama Gadi", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Abd al Alim", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Alsha Lela", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Buthaynah Wasim", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Bari Waql", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Aysha Moukib Rasha", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib Poke", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Aziza Moukib Rasha", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Dalia Melek", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fadil Moukib Eisa", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fadilah Talitha", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Faris Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fatin Moukib Tarique", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mahir Mohammed", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Majida Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Maysa Moukib Azzam", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Parah", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohamad", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib Mudawar", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib Tunisia", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mukhtar Tarik", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Musad Tarik Dawud", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Qaseem Maysun", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rahi Atiya", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rashid Manal", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahir Tarik", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahu Tarik Fatima", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tarik", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Usama Gadi", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Abd al Alim", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Alsha Lela", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fadilah Talitha", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Faris Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Fatin Moukib Tarique", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mahir Mohammed", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Majida Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Maysa Moukib Azzam", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Parah", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohamad", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib Mudawar", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mohammed Moukib Tunisia", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Mukhtar Tarik", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Musad Tarik Dawud", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Qaseem Maysun", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rahi Atiya", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Rashid Manal", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahir Tarik", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tahu Tarik Fatima", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Tarik", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Usama Gadi", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Abd al Alim", "phone" => "303-212-8743", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Taruh Moukib", "phone" => "720-212-8535", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
                array("title" => "Alsha Lela", "phone" => "720-212-9771", "overall_status" => "Unassigned", "email" => "email@email.com", "preferred_contact_method" => "Phone", "seeker_path" => "Contact Attempted", "seeker_milestones" => "States Belief"),
            );

            foreach ($contacts as $contact) {

                $post_title = $contact["title"];
                $post_type = 'contacts';
                $post_content = ' ';
                $post_status = "publish";
                $post_author = get_current_user_id();

                $post = array(
                    "post_title" => $post_title,
                    'post_type' => $post_type,
                    "post_content" => $post_content,
                    "post_status" => $post_status,
                    "post_author" => $post_author,
                    "meta_input" => array(
                        "phone" => $contact["phone"],
                        "seeker_path" => $contact["seeker_path"],
                        "seeker_milestones" => $contact["seeker_milestones"],
                        "overall_status" => $contact["overall_status"],
                        "email" => $contact["email"],
                        "preferred_contact_method" => $contact["preferred_contact_method"],
                    ),
                );

                wp_insert_post($post);

                echo "<br>Added: " . $post_title;
            }

            echo "<br><br>" . count($contacts) . " contacts added";
            echo '</p></div>';

            $option = 'add_sample_contacts';
            $value = '1';
            $deprecated = '';
            $autoload = TRUE;

            add_option($option, $value, $deprecated, $autoload);

        } else {

            echo '<div class="wrap">
                        <h1>Add Sample Contacts</h1>
                        <p>Contacts are already loaded.</p>
                    </div>
                  ';
        }
    }
}