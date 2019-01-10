<?php
/*
Plugin Name: Paid Memberships Pro - Membership Manager Role Add On
Plugin URI: https://www.paidmembershipspro.com/add-ons/pmpro-membership-manager-role/
Description: Adds a Membership Manager role to WordPress with access to PMPro settings and reports.
Version: .3.2
Author: Stranger Studios
Author URI: https://www.paidmembershipspro.com
*/
/*
	Setup role on admin init
*/
function pmprommr_setup_role() {
	remove_role('pmpro_membership_manager');	//in case we updated the caps below

	$caps = apply_filters( 'pmpro_membership_manager_caps', array(
        'pmpro_memberships_menu' => true,
		'pmpro_dashboard' => true,
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
		'pmpro_approvals' => true,
        'read' => true,
		'list_users' => true,
		'add_users' => true,
		'remove_users' => true,
		'create_users' => true,
		'delete_users' => true,
		'promote_users' => true,
		'edit_users' => true,
		'view_admin_dashboard' => true
	    ));	

	add_role('pmpro_membership_manager', 'Membership Manager', $caps );
}
add_action('admin_init', 'pmprommr_setup_role');

/*
	Remove role on deactivation.
*/
function pmprommr_deactivation()
{	
    remove_role('pmpro_membership_manager');
}
register_deactivation_hook(__FILE__, 'pmprommr_deactivation');

/*
	Allow membership managers (and anyone with edit_users cap) to also change membership level.
*/
function pmprommr_pmpro_edit_member_capability($cap)
{
	return 'edit_users';
}
add_filter('pmpro_edit_member_capability', 'pmprommr_pmpro_edit_member_capability');

/*
	Keep membership managers from assigning the editor or administrator role
*/
function pmprommr_editable_roles($roles) {
	if(current_user_can('pmpro_membership_manager')) {
		//filter in case you want to extend this or change it
		$restricted_roles = apply_filters('pmprommr_restricted_roles', array('administrator', 'editor'));
		if(!empty($restricted_roles)) {
			foreach($restricted_roles as $role) {
				if(isset($roles[$role]))
					unset($roles[$role]);
			}
		}
	}

	return $roles;
}
add_filter('editable_roles', 'pmprommr_editable_roles');

/**
 * Keep membership managers from editing users with restricted roles,
 * but still allow super admins to edit admins.
 */
function pmprommr_admin_init_restrict_editable_users() {
	if(!current_user_can('manage_network') && current_user_can('pmpro_membership_manager') && $GLOBALS['pagenow'] == 'user-edit.php') {
		$restricted_roles = apply_filters('pmprommr_restricted_roles', array('administrator', 'editor'));

		$user_id = intval($_REQUEST['user_id']);
		
		foreach($restricted_roles as $role) {
			if(user_can($user_id, $role)) {
				wp_die(sprintf(__('You are not authorized to edit users with the %s role.', 'pmprommr'), $role));
			}
		}

	}
}
add_action('admin_init', 'pmprommr_admin_init_restrict_editable_users');

/*
	Function to add links to the plugin row meta
*/
function pmprommr_plugin_row_meta($links, $file) {
	if(strpos($file, 'pmpro-membership-manager-role.php') !== false)
	{
		$new_links = array(
			'<a href="' . esc_url('https://www.paidmembershipspro.com/add-ons/pmpro-membership-manager-role/')  . '" title="' . esc_attr( __( 'View Documentation', 'pmpro' ) ) . '">' . __( 'Docs', 'pmpro' ) . '</a>',
			'<a href="' . esc_url('http://paidmembershipspro.com/support/') . '" title="' . esc_attr( __( 'Visit Customer Support Forum', 'pmpro' ) ) . '">' . __( 'Support', 'pmpro' ) . '</a>',
		);
		$links = array_merge($links, $new_links);
	}
	return $links;
}
add_filter('plugin_row_meta', 'pmprommr_plugin_row_meta', 10, 2);
