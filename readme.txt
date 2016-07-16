=== PMPro Membership Manager Role ===
Contributors: strangerstudios
Tags: pmpro, membership, role
Requires at least: 3.5
Tested up to: 4.5.3
Stable tag: .3

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
= .3 =
* Removed the ability for membership managers to edit administrators/editors or change users to or from the administrator/editor role. You can filter which roles are restricted using the pmprommr_restricted_roles filter; return an array of role names.

= .2 =
* Fixes so membership managers cannot edit a user's role.

= .1.1 =
* Added readme.txt

= .1 =
* Initial version of the plugin.