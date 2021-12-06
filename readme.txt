=== BF Modal ===
Contributors: jmucak
Donate link: /
Tags: modal, custom modal, popup, custom popup
Requires at least: 4.7
Tested up to: 5.8.2
Stable tag: 1.1.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Convert pages, posts and custom post types to plugin

== Description ==

BF Modal is made to convert any custom post type, page or post to modal. Plugin
automatically adds rewrite rules so you can still have nice and relevant URL when popup is opened.
Take full control of modal and override modal templates. You can create custom modal
templates so each page can have different template. You can also override based on
post type.

== Installation ==

Upload 'bf-modal' to the '/wp-content/plugins/' directory

Activate the plugin through the 'Plugins' menu in WordPress

Convert pages and post types to modal

= How this plugin works =

1. Simply go to BF Modal Options page and choose post type you want to convert to modal
2. Choose an archive page, page that will be displayed below this popup
3. Go to Settings -> Permalinks and save permalinks so rewrite rules can be rewritten
4. That's it, you are good to go, post type single page will open in modal when you visit URL

If you add links to modal pages somewhere it will go to that link and open popup/modal, but if you
want to stay on the same page and not actually go to different page then you can use

To your link you add class **js-bfml-modal-trigger** and post-data-id attribute with post id

Example:

`<a href="#" class="js-bfml-modal-trigger" data-post-data-id="12">
    This is a test post type Link
</a>`

If you want to convert pages to modal
1. Go to page you want to convert, find Modal Page options meta box
2. Set Is Modal to true and set your archive page
3. Settings -> Permalinks and save permalinks
4. Open your page and it will open as modal

== Screenshots ==

1. The BF Modal Options Page
2. Modal Options for pages

== Frequently Asked Questions ==

= What kind of support do you provide? =
Please post your question on plugin support forum

== Upgrade Notice ==
= 1.0.11 =
First Release

== Changelog ==
= 1.0.11 =
*Release Date - 27 October 2021*
First Release

= 1.1.0 =
*Release Date - 06 December 2021*

* New - added remove options on uninstall plugin
* New - added flush rewrite rules when setting rewrite rules
* New - added link to settings page