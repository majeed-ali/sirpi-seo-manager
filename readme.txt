=== Sirpi SEO Manager ===
Contributors: amajeedali0
Donate link: https://sirpisoftwares.com
Tags: seo, meta tags, open graph, xml sitemap, breadcrumbs
Requires at least: 5.0
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A comprehensive SEO plugin for WordPress with meta tags, XML sitemaps, Open Graph, Twitter Cards, and breadcrumbs.

== Description ==

Sirpi SEO Manager is a complete SEO solution for your WordPress website. It provides everything you need to optimize your site for search engines and social media platforms.

= Features =

* **Meta Tags Management** - Custom SEO titles, meta descriptions, and canonical URLs for every post and page.
* **Open Graph Tags** - Optimize how your content appears when shared on Facebook, LinkedIn, and other platforms.
* **Twitter Cards** - Rich card previews when your content is shared on Twitter.
* **XML Sitemap** - Automatically generated XML sitemaps to help search engines discover your content.
* **Breadcrumbs** - Built-in breadcrumb navigation for better user experience and SEO.
* **Focus Keywords** - Set focus keywords per post to optimize your content strategy.
* **Robots Meta** - Control indexing and following per post with noindex/nofollow options.
* **Bulk Settings** - Global settings for homepage title/description, title separator, and more.

== Installation ==

1. Upload the `sirpi-seo-manager` folder to the `/wp-content/plugins/` directory, or install directly through the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the **SEO** menu in your WordPress admin to configure the settings.
4. Edit any post or page to find the SEO Settings meta box.

== Frequently Asked Questions ==

= Does this plugin work with any theme? =

Yes, Sirpi SEO Manager works with any WordPress theme. The meta tags are injected into the site header automatically, and breadcrumbs can be added via a template tag.

= How do I display breadcrumbs on my site? =

Add `<?php sirpi_breadcrumbs(); ?>` to your theme template files where you want breadcrumbs to appear.

= How do I display the SEO title in my theme? =

Use `<?php echo sirpi_title(); ?>` in your theme files.

= How do I get the meta description programmatically? =

Use `<?php echo sirpi_description(); ?>` in your theme files.

= Will this plugin conflict with other SEO plugins? =

We recommend using SEO Manager as your only SEO plugin. Using multiple SEO plugins may cause conflicts.

= How do I customize the XML sitemap? =

The XML sitemap is automatically generated and accessible at `/sitemap.xml` on your site. An index sitemap is available at `/sitemap-index.xml`.

== Screenshots ==

1. SEO Settings page in the WordPress admin.
2. SEO meta box on the post edit screen.

== Changelog ==

= 1.0.1 =
* Security enhancement: Proper sanitization of nonces before verification.
* Codebase validation against WordPress Coding Standards and Plugin Check.

= 1.0.0 =
* Initial release.