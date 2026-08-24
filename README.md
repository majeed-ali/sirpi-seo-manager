# Sirpi SEO Manager

A comprehensive SEO plugin for WordPress with meta tags, XML sitemaps, Open Graph, Twitter Cards, and breadcrumbs.

[![License: GPL v2](https://img.shields.io/badge/License-GPLv2-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

## Features

- **Meta Tags Management** — Custom SEO titles, meta descriptions, and canonical URLs for every post and page.
- **Open Graph Tags** — Optimize how your content appears when shared on Facebook, LinkedIn, and other platforms.
- **Twitter Cards** — Rich card previews when your content is shared on Twitter.
- **XML Sitemap** — Automatically generated XML sitemaps to help search engines discover your content.
- **Breadcrumbs** — Built-in breadcrumb navigation for better user experience and SEO.
- **Focus Keywords** — Set focus keywords per post to optimize your content strategy.
- **Robots Meta** — Control indexing and following per post with noindex/nofollow options.
- **Bulk Settings** — Global settings for homepage title/description, title separator, and more.

## Installation

1. Upload the `sirpi-seo-manager` folder to the `/wp-content/plugins/` directory, or install directly through the WordPress plugins screen.
2. Activate the plugin through the **Plugins** screen in WordPress.
3. Go to the **SEO** menu in your WordPress admin to configure the settings.
4. Edit any post or page to find the SEO Settings meta box.

## Usage

### Display breadcrumbs in your theme

```php
<?php sirpi_breadcrumbs(); ?>
```

### Display the SEO title in your theme

```php
<?php echo sirpi_title(); ?>
```

### Get the meta description programmatically

```php
<?php echo sirpi_description(); ?>
```

### XML Sitemap

The XML sitemap is automatically generated and accessible at `/sitemap.xml` on your site. An index sitemap is available at `/sitemap-index.xml`.

## Frequently Asked Questions

**Does this plugin work with any theme?**

Yes, Sirpi SEO Manager works with any WordPress theme. The meta tags are injected into the site header automatically, and breadcrumbs can be added via a template tag.

**Will this plugin conflict with other SEO plugins?**

We recommend using Sirpi SEO Manager as your only SEO plugin. Using multiple SEO plugins may cause conflicts.

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

## Changelog

### 1.0.1
- Security enhancement: Proper sanitization of nonces before verification.
- Codebase validation against WordPress Coding Standards and Plugin Check.

### 1.0.0
- Initial release with meta tags, XML sitemaps, Open Graph, Twitter Cards, and breadcrumbs.

## License

GPLv2 or later. See [LICENSE](COPYING) for details.

