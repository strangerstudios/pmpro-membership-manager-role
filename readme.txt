=== PMPro Membership Manager Role ===
Contributors: strangerstudios
Tags: pmpro, membership, role
Requires at least: 5.2
Tested up to: 6.4
Stable tag: 0.3.3

== Description ==

Features:
* Give users the "Membership Manager" role to allow them to manage your Paid Memberships Pro settings, without complete administrator access.
* Adds specific capabilities for each page under the Memberships menu in the WordPrss dashboard.

Simply install and activate the plugin and the Membership Manager role will be added to your site.
You can then assign the role to a user and they will be able to manage your Paid Memberships Pro settings, but nothing else.

The Membership Manager role also adds specific capabilities for each page under the Membership menu, which allows you to customize access on a per-page basis.

== Installation ==

1. Upload the `pmpro-membership-manager-role` directory to the `/wp-content/plugins/` directory of your site.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= I found a bug in the plugin. =

Please post it in the issues section of GitHub and we'll fix it as soon as we can. Thanks for helping. https://github.com/strangerstudios/pmpro-gift-levels/issues

== Changelog ==
= 0.3.3 - 2024-02-29 =
* ENHANCEMENT: Improved capability support for Paid Memberships Pro 3.0+
* ENHANCEMENT: Added localization to the plugin to make strings translatable.

= .3.2 =
* BUG FIX/ENHANCEMENT: Added the pmpro_dashboard capability so users will have access to the new dashboard in PMPro version 2.0+.
* BUG FIX/ENHANCEMENT: Now allowing Super Admins on multisite installs to edit admin users.
* ENHANCEMENT: Added pmpro_membership_manager_caps filter so other plugins can add caps for membership managers.

= .3.1 =
* BUG FIX/ENHANCEMENT: Loading the Membership Manager role on admin init instead of activation so capabilities are updated when the plugin updates.
* ENHANCEMENT: Giving managers the "pmpro_approvals" capability to allow for integration with the PMPro Approvals plugin.

= .3 =
* Removed the ability for membership managers to edit administrators/editors or change users to or from the administrator/editor role. You can filter which roles are restricted using the pmprommr_restricted_roles filter; return an array of role names.

= .2 =
* Fixes so membership managers cannot edit a user's role.

= .1.1 =
* Added readme.txt

= .1 =
* Initial version of the plugin.