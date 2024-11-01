=== WordPress Google +1 Button - Advanced Plugin, Includes Redirection ===
Contributors: jacobwg
Donate link: http://blog.jacobwg.com/donate/
Tags: Google +1, Google, +1, featured posts, sharing, page, plugin, Post, posts, wordpress like, button, like, custom post type, custom post types, cpt, attachments, widgets
Requires at least: 3.1.0
Tested up to: 3.3.0
Stable tag: 1.9

== Description ==

Search for **wp-plus-one** in *Plugins > Add New*.

Adds the Google +1 button to your website's posts, pages, attachments, and custom post types.  Has a variety of options for button style and position, and exposes a `wp_plus_one_button` action for custom integration with the theme or other plugin.

* Adds the Google +1 button to posts, pages, attachments, and custom post types (enable/disable for each)
* Allows you to disable the +1 button on specific pages in that post/page's metabox
* Four display styles (standard, small, medium, tall)
* Enable / disable the +1 count on the buttons
* 4 position options for top and bottom of the post (independent) - (float left, float right, no float, or none)
* *NEW* - +1 button widgets
* *NEW* - redirect the user to a custom URL after clicking the +1 button
* Custom CSS to add custom CSS styling to the button code
* Exposes a `wp_plus_one_button` action for custom integration with your theme or plugin
* Exposes the +1 button clicks as pubsub events: subscribe with `plusone.subscribe('click', function(params) { ... });` in your custom JavaScript
* Spanish translation kindly provided by [InMotion Hosting](http://www.inmotionhosting.com/)

From [Google](http://www.google.com/+1/button/):

> The +1 button is shorthand for "this is pretty cool" or "you should check this out."
> 
> Click +1 to publicly give something your stamp of approval. Your +1's can help friends, contacts, and others on the web find the best stuff when they search.

+1's are expected to influence a website's search performance, so be sure you are integrated now.

[Find out more about the +1 button](http://www.google.com/support/webmasters/bin/answer.py?answer=1140194)

As easy as enabling a plugin!

Have a suggestion?  Let me know!

[Plugin Page](http://blog.jacobwg.com/wp-plus-one/)

== Installation ==

1. Upload `wp-plus-one` folder to the `/wp-content/plugins/` directory or search for "WordPress Google +1 Button" in the Pluugins > Add New menu
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Customize the settings if desired at 

== Frequently Asked Questions ==

= Is the plugin free? =

Absolutely, though you can always [donate](http://blog.jacobwg.com/donate/) if you're liking it.

= Why use this plugin? =

This plugin automatically adds the Google +1 button to your posts.  The +1 button is expected to greatly influence your website's performance in Google search.

= How about support? =

Follow me at Twitter @jacobwg or leave a comment on the [Plugin Page](http://blog.jacobwg.com/wp-plus-one/).

== Changelog ==

= 1.9.0 =

Added custom i18n text domain and Spanish translation from InMotion Hosting

= 1.8.2 =

Fixed redirection tags, removed dependency on jQuery, disabled custom post type support if WordPress doesn't support it (i.e. on an older version of WP)

= 1.8.1 =

Added the missing checkbox for hide on excerpts

= 1.8.0 =

Added new +1 click pubsub JS framework

= 1.7.0 =

Can now choose top and bottom positions independently (top = float left, bottom = none, etc.)

= 1.6.0 =

Added +1 widgets

= 1.5.1 =

Restored the ability to hide the +1 buttons on the homepage

= 1.5.0 =

Added the ability to redirect to a custom URL (specified globally or individually per post) after the user clicks the +1 button

= 1.4.3 =

Fixed a bug where the do_action call would only pass the first argument to the +1 function

= 1.4.2 =

Fixed infinite redirect loop in action (thanks to Dominic Tobias)

= 1.4.1 =

Added the ability to hide the +1 button from excerpts

= 1.4.0 = 

Added the ability to hide the +1 button on the homepage

= 1.3.4 =

* Fixed a bug where two +1 buttons could appear
* Fixed an admin settings bug where a label was assigned to the wrong checkbox
* Added the +1 JavaScript back into the admin area

= 1.3.3 =

Plugin script now automatically chooses the language of the website for the button include script (improved speed)

= 1.3.2 = 

Added the option to output the +1 JavaScript in the header instead of footer to fix various bugs

= 1.3.1 = 

Fixes bug where the "show count" option did nothing at all

= 1.3.0 =

Adds custom post type support

= 1.2.0 =

Added the ability to define custom CSS to be included on the button code.

= 1.1.0 =

Added the ability to choose whether or not to display on post and/or pages.
Added the ability to disable the +1 button on specific posts or pages (a la ShareDaddy)

= 1.0.0 =

Initial version

== Upgrade Notice ==

None at this time

== Screenshots ==

1. The +1 button in a post
2. Some of the available settings

== Did you like it? ==

Did you like this plugin?  Feel free to donate... to my iOS app fund!  :)  [Donate Here](http://blog.jacobwg.com/donate/)

And *please* rate this plugin - it really helps!

Feel free to follow me at @jacobwg