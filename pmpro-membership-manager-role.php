<?php
/*
Plugin Name: Paid Memberships Pro - Membership Manager Role Add On
Plugin URI: http://www.paidmembershipspro.com/pmpro-membership-manager-role/
Description: Adds a Membership Manager role to WordPress with access to PMPro settings and reports.
Version: .1.1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/
/*
	Activation/Deactivation
*/
function pmprommr_activation()
{
    remove_role('pmpro_membership_manager');	//in case we updated the caps below
	add_role('pmpro_membership_manager', 'Membership Manager', array(
        'pmpro_memberships_menu' => true,
		'pmpro_edit_memberships' => true,
        'pmpro_membershiplevels' => true,
		'pmpro_pagesettings' => true,
        'pmpro_emailsettings' => true,
		'pmpro_paymentsettings' => true,        		
        'pmpro_advancedsettings' => true, 
        'pmpro_addons' => true,
		'pmpro_memberslist' => true,
        'pmpro_memberslistcsv' => true,        
        'pmpro_reports' => true,
		'pmpro_orders' => true,
        'pmpro_orderscsv' => true,
		'pmpro_discountcodes' => true,		
        'read' => true,
		'edit_users' => true
    ));
}
function pmprommr_deactivation()
{	
    remove_role('pmpro_membership_manager');
}
register_activation_hook(__FILE__, 'pmprommr_activation');
register_deactivation_hook(__FILE__, 'pmprommr_deactivation');

/*
Function to add links to the plugin row meta
*/
function pmprommr_plugin_row_meta($links, $file) {
	if(strpos($file, 'pmpro-membership-manager-role.php') !== false)
	{
		$new_links = array(
			'<a href="' . esc_url('http://www.paidmembershipspro.com/add-ons/plugins-on-github/pmpro-membership-manager-role/')  . '" title="' . esc_attr( __( 'View Documentation', 'pmpro' ) ) . '">' . __( 'Docs', 'pmpro' ) . '</a>',
			'<a href="' . esc_url('http://paidmembershipspro.com/support/') . '" title="' . esc_attr( __( 'Visit Customer Support Forum', 'pmpro' ) ) . '">' . __( 'Support', 'pmpro' ) . '</a>',
		);
		$links = array_merge($links, $new_links);
	}
	return $links;
}
add_filter('plugin_row_meta', 'pmprommr_plugin_row_meta', 10, 2);
