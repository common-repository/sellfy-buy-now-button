=== Sellfy 'Buy now' button ===
Contributors: sellfy
Tags: sellfy, add sellfy button, sellfy javascript popup, sell digital downloads, ecommerce, e-commerce, buy now button, sell downloads, downloads, buy now
Requires at least: 3.0.1
Tested up to: 3.7.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin provide an easy way to add Sellfy's 'Buy button' to your wordpress blog. Works in your posts, pages, etc.

== Description ==

[Sellfy](https://sellfy.com/ "Sellfy - Sell digital downloads") is the simplest platform to sell and distribute digital content. Sell e-books, music, photos, comics, icons, web design, etc.  

[Sellfy](https://sellfy.com/ "Sellfy - Sell digital downloads") allows to distribute your created content directly to your audience with just a few clicks.  

This is an official plugin for WordPress made by Sellfy.com. Super lightweight plugin creates new shortcode [sellfy-button], which can be used on any post, page or widget.  

Just write or paste shortcode and add your [Sellfy's](https://sellfy.com/ "Sellfy - Sell digital downloads") product page key, e.g.[sellfy-button key=”pMiy”].  

After adding shortcode onto your page there will be cool “Buy now” button displayed automatically. No more editing your template files in order to add javascript script.  


== Installation ==

1. Upload wp-sellfy.zip through Plugins->Add New, or extract and upload the folder to the /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the shortcode in a post, page, etc. like this: [sellfy-button key="XXXX"]

= Usage =
* Place the shortcode in a post, page, etc. like this: [sellfy-button key="XXXX"], where XXXX is your product key.
* If you don't want modal window, you can add button type: [sellfy-button key="XXXX" type="new-window"] 

= Warning =
* This plugin requires, that your theme contain wp_footer() tag.

== Screenshots ==

1. Create post and add button shortcode
2. After post is published, plugin will generate button automatically.
3. Clicking on button will open modal window within your website.

== Changelog ==

= 1.0 =
* Initial version
= 1.1 =
* Rewrite code
* Add notice about mandatory wp_footer() tag
