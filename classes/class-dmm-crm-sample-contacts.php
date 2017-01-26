<?php

/*
 * Class for creating sample contacts
 *
 * @package dmm-crm-sample-data
 * */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class dmm_crm_sample_contacts
{

    /**
     * dmm_crm_sample_contacts The single instance of dmm_crm_sample_contacts.
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = NULL;

    /**
     * Access plugin instance. You can create further instances by calling
     * the constructor directly.
     * @since 0.1
     * @static
     * @return dmm_crm_sample_contacts instance
     */
    public static function instance()
    {
        if (NULL === self::$_instance)
            self::$_instance = new self;
        return self::$_instance;
    }

    // Constructor class
    public function __construct()
    {

        add_action('admin_menu', array($this, 'sample_data_menu'));

    }

    // Option pages
    public function sample_data_menu()
    {

        if (get_option('add_sample_contacts') !== '1') {
            add_options_page('Add Sample Contacts', 'Add Sample Contacts', 'manage_options', 'sample-contacts-data', array($this, 'add_contacts_options'));
        }

        add_options_page('Reset Sample Data', 'Reset Sample Data', 'manage_options', 'sample-reset-data', array($this, 'reset_sample_options'));
    }

    public function add_contacts_options()
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


// Reset the links to the add pages.
    public function reset_sample_options()
    {

        delete_option('add_sample_contacts');
        delete_option('add_sample_groups');

        echo '<div class="wrap">
                    <h1>Reset Sample Data</h1>
                    <p>Contacts Reset <a href="/wp-admin/options-general.php">Refresh</a>
                    <p><a href="/wp-admin/options-general.php?page=sample-contacts-data">Add Contacts</a></p>
                    <p><a href="/wp-admin/options-general.php?page=sample-groups-data">Add Groups</a></p>
                </div>
                ';
    }
}