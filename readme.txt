=== Post QR Code Link ===
Contributors: Michael Homeister
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: plugin, qrcode, backend, qr-link
Requires at least: 3.5
Tested up to: 5.8.3
Stable tag: trunk

This plugin shows a QR code with the current permalink in a backend metabox for quick-access to the page/post via tablet or phone.

== Description ==

Supports posts and pages.

== How to Use this Plugin ==

1. Just activate this plugin and you'll see a new meta-box showing a QR-Code with the permalink to the current post/page

== ToDo ==

There will be an admin page to activate or deactivate this meta-box feature for the post-types you like. As for now you can use the
filter qrcode_link_post_types to return a string-array of post-types you want this feature for.

Example:
add_filter('qrcode_link_post_types', 'qrcode_post_types');
function qrcode_post_types($post_types){
	return ['post', 'page', 'product'];
}

== Changelog ==

= 1.0.1 =
* Updated outputted values to be escaped and added filter-support for post-type-array

= 1.0.0 =
* First release
