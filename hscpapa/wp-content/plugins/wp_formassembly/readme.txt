=== WP-FormAssembly ===
Contributors: FormAssembly.com  / Drew Buschhorn
Tags: forms
Requires at least: 4.0.0
Tested up to: 4.1.0
Stable tag: 2.0

Embed a FormAssembly Web Form in a WordPress Post. To use, add a [formassembly formid=NNNN] tag to your post. To create your web form, go to http://www.formassembly.com

== Description ==
To add your form to your WordPress page:

1. Install our WordPress Plugin.
1. Copy the form ID. The ID can be found in the Publish tab, at the end of the publicly available address (e.g., http://www.tfaforms.com/123456).
1. Replace 123456 with the ID of your form in the shortcode.
1. If you're a FormAssembly Enterprise customer, add the server attribute in the shortcode (see below).

=== Example Shortcodes ===

FormAssembly Professional, Premier, & Basic Plans - (tfaforms.com):
[formassembly formid=123456]


FormAssembly Enterprise Cloud Edition - (Most commonly: organization.tfaforms.net):
[formassembly formid=123456 server="http://your.server.tld"]

Publish with an iframe - (Inline Frame):

If you'd rather display the form in an inline frame, or if your server doesn't support the default publishing method, add the iframe attribute to your tag.

For instance, a benefit to using an iframe would be to avoid conflicting CSS rules between the parent site and the embedded form.
[formassembly formid=123456 iframe=1]

OR

[formassembly formid=123456 server="http://your.server.tld" iframe=1]

Publish a Workflow:

[formassembly workflowid=1234]

Add Style:

It is possible to add CSS to your shortcode to control the size of the form/iframe in the page. For example, you can define the width:
[formassembly formid=123456 iframe=1 style="width: 300px !important;"]

http://help.formassembly.com/knowledgebase/articles/340363-wordpress

== Installation ==

1. Upload wp_formassembly.zip to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place [formassembly formid=NNNN] shortcode in your post.

== Changelog ==

= 2.0 =
*   Updated release for WordPress shortcodes.
*   Uses single bracket, but try to keep backwards compatibility with double backet notation for now.
= 1.0 =
*   Initial release.
*   Uses double bracket notation.