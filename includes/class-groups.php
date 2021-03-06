<?php

/*
 * Class for creating sample contacts
 *
 * @package dmm-crm-sample-data
 * */

if (!defined( 'ABSPATH' )) { exit; // Exit if accessed directly
}

class DT_Demo_Groups
{

    /**
     * DT_Demo_Groups The single instance of DT_Demo_Groups
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;

    /**
     * Access plugin instance. You can create further instances by calling
     * the constructor directly.
     * @static
     * @return DT_Demo_Groups instance
     */
    public static function instance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    // Constructor class
    public function __construct() { }



    /******************************************************************************/
    /* Section :  Add Groups by Count */

    /**
     * Loops contact creation according to supplied $count.
     * @param $count    int Number of records to create.
     * @return string
     */
    public function add_groups_by_count( $count )
    {
        $i = 0;
        while ($count > $i ) {

            $post = $this->single_plain_group();
            $group_id = Disciple_Tools_Groups::create_group( $post, false );
            if ( !is_wp_error( $group_id )){
                update_post_meta( $group_id, "_sample", "sample" );
            }

            $i++;
        }
        return $count . ' records created';
    }

    /**
     * Builds a single random contact record.
     * @return array|WP_Post
     */
    public function single_plain_group() {

        $post = [
            "title" => 'Group' . rand( 100, 999 ),
            "group_status" => dt_demo_random_group_status(),
            "group_type" => dt_demo_random_group_type(),
            "contact_address" => [ "values" => [ [ "value" => dt_demo_full_address() ] ] ],
        ];

        return $post;
    }

    /**
     * Delete all groups in database
     * @return string
     */
    public function delete_groups () {

        global $wpdb;

        $args = array(
            'numberposts'   => -1,
            'post_type'   => 'groups',
            "meta_key"  => '_sample',
            "meta_value"    => 'sample',
        );
        $groups = get_posts( $args );

        foreach ($groups as $group) {
            $id = $group->ID;

            $wpdb->get_results( "DELETE FROM $wpdb->p2p WHERE p2p_from = '$id' OR p2p_to = '$id'" );

            wp_delete_post( $id, true );
        }

        $wpdb->get_results( "DELETE FROM $wpdb->p2pmeta WHERE NOT EXISTS (SELECT NULL FROM $wpdb->p2p WHERE $wpdb->p2p.p2p_id = $wpdb->p2pmeta.p2p_id)" );

        return 'Groups deleted';

    }
}
