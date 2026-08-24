<?php
/**
 * Uninstall SEO Manager.
 *
 * Removes all plugin data including options and post meta.
 *
 * @package SIRPI_SEO_Manager
 */

// If uninstall not called from WordPress, exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete plugin options.
delete_option( 'sirpi_seo_manager_settings' );

// Delete post meta for all posts.
$sirpi_meta_keys = array(
	'_sirpi_meta_title',
	'_sirpi_meta_description',
	'_sirpi_focus_keyword',
	'_sirpi_og_image_id',
	'_sirpi_canonical_url',
	'_sirpi_noindex',
	'_sirpi_nofollow',
);

foreach ( $sirpi_meta_keys as $sirpi_meta_key ) {
	delete_post_meta_by_key( $sirpi_meta_key );
}
