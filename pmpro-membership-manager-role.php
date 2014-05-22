<?php
/*
Plugin Name: PMPro Membership Manager Role
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
        'pmpro_membersliscsv' => true,        
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