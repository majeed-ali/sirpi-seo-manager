<?php
/**
 * Plugin Name: Sirpi SEO Manager
 * Description: A comprehensive SEO plugin for WordPress with meta tags, XML sitemaps, Open Graph, Twitter Cards, and breadcrumbs.
 * Version: 1.0.1
 * Author: Abdul Majeed Ali
 * Author URI: https://sirpisoftwares.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sirpi-seo-manager
 * Domain Path: /languages
 *
 * @package SIRPI_SEO_Manager
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants.
define( 'SIRPI_SEO_MANAGER_VERSION', '1.0.1' );
define( 'SIRPI_SEO_MANAGER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SIRPI_SEO_MANAGER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SIRPI_SEO_MANAGER_ICON', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2ZXJzaW9uPSIxLjEiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMjU2IDI1NiI+CiAgPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI5LjYuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDIuMS4xIEJ1aWxkIDkpICAtLT4KICA8ZGVmcz4KICAgIDxzdHlsZT4KICAgICAgLnN0MCB7CiAgICAgICAgZmlsbDogdXJsKCNsaW5lYXItZ3JhZGllbnQpOwogICAgICB9CiAgICA8L3N0eWxlPgogICAgPGxpbmVhckdyYWRpZW50IGlkPSJsaW5lYXItZ3JhZGllbnQiIHgxPSI5LjQ4IiB5MT0iMTI4IiB4Mj0iMjQ2LjUyIiB5Mj0iMTI4IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CiAgICAgIDxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2JmMGEwMCIvPgogICAgICA8c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmZjc3MTUiLz4KICAgIDwvbGluZWFyR3JhZGllbnQ+CiAgPC9kZWZzPgogIDxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNTYuODEsNDcuMDhjMTkuNDgsMCwzNy4xNSw3LjkzLDQ5Ljk2LDIwLjY4LDEyLjc5LDEyLjc5LDIwLjY4LDMwLjQyLDIwLjY4LDQ5Ljk0LDAsMTQuMjUtNC4yNCwyNy41Ni0xMS41LDM4LjY1bDMwLjU3LDMzLjMxLTIxLjA4LDE5LjI3LTI5LjUxLTMyLjQyYy0xMS4xOSw3LjQ2LTI0LjY3LDExLjgtMzkuMTIsMTEuOC0xNi4wOSwwLTMwLjk0LTUuNC00Mi44Mi0xNC40Ny03LjQxLDcuNDYtMTQuNDksMTQuNTYtMjAuNDUsMjAuNTJsLTQwLjk1LTQwLjQ1LTI4Ljc4LDI3Ljk1LTE0LjMzLTE0LjMzaDBsNDMuMzYtNDIuMTRjMTMuNTQsMTMuNTQsMjYuOTMsMjYuOTMsNDAuNiw0MC40M2w2LjM1LTYuNGMtOC41Ni0xMS42OS0xMy42LTI2LjA4LTEzLjYtNDEuNywwLTE5LjQ4LDcuOTMtMzcuMTUsMjAuNjgtNDkuOTQsMTIuNzktMTIuODMsMzAuNDItMjAuNyw0OS45NC0yMC43aDBaTTExMC42MywxNDguNDdsMjguMjItMjguNDktMTYuOC0xNi44LDQ3LjI2LS40MnY0Ny42OGwtMTYuMTQtMTYuMTRjLTguMSw4LjItMTguMywxOC41Mi0yOC42LDI4LjkxLDkuMTIsNi42NSwyMC4zOSwxMC42MSwzMi41NCwxMC42MSwxNS4yNiwwLDI5LjExLTYuMjEsMzkuMS0xNi4yMiwxMC4wMS0xMC4wMSwxNi4yMi0yMy44NCwxNi4yMi0zOS4xcy02LjIxLTI5LjExLTE2LjIyLTM5LjFoMGMtMTAuMDEtMTAuMDEtMjMuODQtMTYuMjItMzkuMS0xNi4yMnMtMjkuMTEsNi4yMS0zOS4xLDE2LjIyYy0xMC4wMSwxMC4wMS0xNi4yMiwyMy44NC0xNi4yMiwzOS4xLDAsMTEuMDMsMy4yNiwyMS4zMyw4Ljg1LDI5Ljk3aDBaIi8+Cjwvc3ZnPg==' );

/**
 * Main plugin class.
 */
class SIRPI_SEO_Manager {

    /**
     * Singleton instance.
     *
     * @var SIRPI_SEO_Manager
     */
    private static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return SIRPI_SEO_Manager
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct() {
        $this->init_hooks();
    }

    /**
     * Initialize WordPress hooks.
     */
    private function init_hooks() {
        // Admin hooks.
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
        add_action( 'add_meta_boxes', array( $this, 'add_seo_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_seo_meta_data' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );

        // Frontend hooks.
        add_action( 'wp_head', array( $this, 'render_meta_tags' ), 1 );
        add_action( 'wp_head', array( $this, 'render_open_graph_tags' ), 2 );
        add_action( 'wp_head', array( $this, 'render_twitter_card_tags' ), 3 );
        add_action( 'wp_head', array( $this, 'render_canonical_url' ), 4 );

        // Title tag filter (instead of outputting <title> directly).
        add_filter( 'pre_get_document_title', array( $this, 'filter_document_title' ), 10, 1 );

        // XML Sitemap.
        add_action( 'init', array( $this, 'init_sitemap' ) );
        add_action( 'wp', array( $this, 'handle_sitemap_request' ) );

        // Breadcrumbs.
        add_filter( 'sirpi_breadcrumb', array( $this, 'generate_breadcrumbs' ) );

        // Admin list table columns.
        add_action( 'admin_init', array( $this, 'add_post_list_columns' ) );

        // Activation / Deactivation hooks.
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
    }

    /**
     * Plugin activation.
     */
    public function activate() {
        // Set default options.
        $defaults = array(
            'enable_meta_tags'     => 1,
            'enable_open_graph'    => 1,
            'enable_twitter_cards' => 1,
            'enable_sitemap'       => 1,
            'enable_breadcrumbs'   => 1,
            'home_title'           => get_bloginfo( 'name' ),
            'home_description'     => get_bloginfo( 'description' ),
            'separator'            => '|',
            'meta_keywords'        => '',
        );

        if ( ! get_option( 'sirpi_seo_manager_settings' ) ) {
            add_option( 'sirpi_seo_manager_settings', $defaults );
        }

        // Flush rewrite rules for sitemap.
        $this->init_sitemap();
        flush_rewrite_rules();
    }

    /**
     * Plugin deactivation.
     */
    public function deactivate() {
        flush_rewrite_rules();
    }

    /**
     * Enqueue admin assets.
     *
     * @param string $hook The current admin page hook.
     */
    public function enqueue_admin_assets( $hook ) {
        if ( 'post.php' === $hook || 'post-new.php' === $hook || 'settings_page_sirpi-seo-manager' === $hook || 'toplevel_page_sirpi-seo-manager' === $hook ) {
            wp_enqueue_media();

            wp_enqueue_style(
                'sirpi-seo-manager-admin',
                SIRPI_SEO_MANAGER_PLUGIN_URL . 'assets/admin.css',
                array(),
                SIRPI_SEO_MANAGER_VERSION
            );

            wp_enqueue_script(
                'sirpi-seo-manager-admin',
                SIRPI_SEO_MANAGER_PLUGIN_URL . 'assets/admin.js',
                array( 'jquery' ),
                SIRPI_SEO_MANAGER_VERSION,
                true
            );

            wp_localize_script(
                'sirpi-seo-manager-admin',
                'sirpiAdmin',
                array(
                    'siteName'    => get_bloginfo( 'name' ),
                    'mediaTitle'  => __( 'Select Image', 'sirpi-seo-manager' ),
                    'mediaButton' => __( 'Use Image', 'sirpi-seo-manager' ),
                )
            );
        }
    }

    /**
     * Add admin menu pages.
     */
    public function add_admin_menu() {
        add_menu_page(
            __( 'SEO Manager', 'sirpi-seo-manager' ),
            __( 'SEO', 'sirpi-seo-manager' ),
            'manage_options',
            'sirpi-seo-manager',
            array( $this, 'render_settings_page' ),
            SIRPI_SEO_MANAGER_ICON,
            100
        );

        add_submenu_page(
            'sirpi-seo-manager',
            __( 'SEO Settings', 'sirpi-seo-manager' ),
            __( 'Settings', 'sirpi-seo-manager' ),
            'manage_options',
            'sirpi-seo-manager',
            array( $this, 'render_settings_page' )
        );
    }

    /**
     * Register plugin settings.
     */
    public function register_settings() {
        register_setting(
            'sirpi_seo_manager_settings_group',
            'sirpi_seo_manager_settings',
            array( $this, 'sanitize_settings' )
        );

        add_settings_section(
            'sirpi_seo_manager_main_section',
            __( 'General Settings', 'sirpi-seo-manager' ),
            array( $this, 'render_settings_section' ),
            'sirpi-seo-manager'
        );

        $fields = array(
            'enable_meta_tags'     => array(
                'title' => __( 'Enable Meta Tags', 'sirpi-seo-manager' ),
                'type'  => 'checkbox',
            ),
            'enable_open_graph'    => array(
                'title' => __( 'Enable Open Graph Tags', 'sirpi-seo-manager' ),
                'type'  => 'checkbox',
            ),
            'enable_twitter_cards' => array(
                'title' => __( 'Enable Twitter Cards', 'sirpi-seo-manager' ),
                'type'  => 'checkbox',
            ),
            'enable_sitemap'       => array(
                'title' => __( 'Enable XML Sitemap', 'sirpi-seo-manager' ),
                'type'  => 'checkbox',
            ),
            'enable_breadcrumbs'   => array(
                'title' => __( 'Enable Breadcrumbs', 'sirpi-seo-manager' ),
                'type'  => 'checkbox',
            ),
            'home_title'           => array(
                'title' => __( 'Homepage Title', 'sirpi-seo-manager' ),
                'type'  => 'text',
            ),
            'home_description'     => array(
                'title' => __( 'Homepage Description', 'sirpi-seo-manager' ),
                'type'  => 'textarea',
            ),
            'separator'            => array(
                'title'   => __( 'Title Separator', 'sirpi-seo-manager' ),
                'type'    => 'select',
                'options' => array( '|', '-', '•', '~', '—', '»' ),
            ),
        );

        foreach ( $fields as $field_id => $field ) {
            add_settings_field(
                $field_id,
                $field['title'],
                array( $this, 'render_settings_field' ),
                'sirpi-seo-manager',
                'sirpi_seo_manager_main_section',
                array(
                    'field_id' => $field_id,
                    'type'     => $field['type'],
                    'options'  => isset( $field['options'] ) ? $field['options'] : array(),
                )
            );
        }
    }

    /**
     * Render settings section description.
     */
    public function render_settings_section() {
        echo '<p>' . esc_html__( 'Configure your SEO settings below.', 'sirpi-seo-manager' ) . '</p>';
    }

    /**
     * Render a settings field.
     *
     * @param array $args Field arguments.
     */
    public function render_settings_field( $args ) {
        $options  = get_option( 'sirpi_seo_manager_settings' );
        $field_id = $args['field_id'];
        $type     = $args['type'];
        $value    = isset( $options[ $field_id ] ) ? $options[ $field_id ] : '';

        switch ( $type ) {
            case 'checkbox':
                ?>
                <label>
                    <input type="checkbox" name="sirpi_seo_manager_settings[<?php echo esc_attr( $field_id ); ?>]" value="1" <?php checked( 1, $value ); ?> />
                    <?php esc_html_e( 'Enable', 'sirpi-seo-manager' ); ?>
                </label>
                <?php
                break;

            case 'text':
                ?>
                <input type="text" name="sirpi_seo_manager_settings[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
                <?php
                break;

            case 'textarea':
                ?>
                <textarea name="sirpi_seo_manager_settings[<?php echo esc_attr( $field_id ); ?>]" rows="4" class="large-text"><?php echo esc_textarea( $value ); ?></textarea>
                <?php
                break;

            case 'select':
                ?>
                <select name="sirpi_seo_manager_settings[<?php echo esc_attr( $field_id ); ?>]">
                    <?php foreach ( $args['options'] as $option ) : ?>
                        <option value="<?php echo esc_attr( $option ); ?>" <?php selected( $value, $option ); ?>><?php echo esc_html( $option ); ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
        }
    }

    /**
     * Sanitize settings before saving.
     *
     * @param array $input The input data.
     * @return array Sanitized data.
     */
    public function sanitize_settings( $input ) {
        $sanitized = array();

        $sanitized['enable_meta_tags']     = isset( $input['enable_meta_tags'] ) ? 1 : 0;
        $sanitized['enable_open_graph']    = isset( $input['enable_open_graph'] ) ? 1 : 0;
        $sanitized['enable_twitter_cards'] = isset( $input['enable_twitter_cards'] ) ? 1 : 0;
        $sanitized['enable_sitemap']       = isset( $input['enable_sitemap'] ) ? 1 : 0;
        $sanitized['enable_breadcrumbs']   = isset( $input['enable_breadcrumbs'] ) ? 1 : 0;
        $sanitized['home_title']           = isset( $input['home_title'] ) ? sanitize_text_field( $input['home_title'] ) : '';
        $sanitized['home_description']     = isset( $input['home_description'] ) ? sanitize_textarea_field( $input['home_description'] ) : '';
        $sanitized['meta_keywords']        = isset( $input['meta_keywords'] ) ? sanitize_text_field( $input['meta_keywords'] ) : '';

        $allowed_separators     = array( '|', '-', '•', '~', '—', '»' );
        $sanitized['separator'] = isset( $input['separator'] ) && in_array( $input['separator'], $allowed_separators, true ) ? $input['separator'] : '|';

        $sanitized['google_verify']  = isset( $input['google_verify'] ) ? sanitize_text_field( $input['google_verify'] ) : '';
        $sanitized['bing_verify']    = isset( $input['bing_verify'] ) ? sanitize_text_field( $input['bing_verify'] ) : '';
        $sanitized['twitter_handle'] = isset( $input['twitter_handle'] ) ? sanitize_text_field( $input['twitter_handle'] ) : '';

        return $sanitized;
    }

    /**
     * Add SEO columns to post list screens for all public post types.
     */
    public function add_post_list_columns() {
        $post_types = get_post_types( array( 'public' => true ), 'names' );
        foreach ( $post_types as $post_type ) {
            add_filter( "manage_{$post_type}_posts_columns", array( $this, 'add_seo_columns' ) );
            add_action( "manage_{$post_type}_posts_custom_column", array( $this, 'render_seo_column' ), 10, 2 );
        }
    }

    /**
     * Add SEO Meta Title and Description columns.
     *
     * @param array $columns The existing columns.
     * @return array Modified columns.
     */
    public function add_seo_columns( $columns ) {
        $columns['sirpi_meta_title']       = __( 'SEO Title', 'sirpi-seo-manager' );
        $columns['sirpi_meta_description'] = __( 'SEO Desc', 'sirpi-seo-manager' );
        return $columns;
    }

    /**
     * Render SEO column content.
     *
     * @param string $column  Column name.
     * @param int    $post_id Post ID.
     */
    public function render_seo_column( $column, $post_id ) {
        if ( 'sirpi_meta_title' === $column ) {
            $meta_title = get_post_meta( $post_id, '_sirpi_meta_title', true );
            echo ! empty( $meta_title ) ? esc_html( $meta_title ) : '&mdash;';
        }
        if ( 'sirpi_meta_description' === $column ) {
            $meta_desc = get_post_meta( $post_id, '_sirpi_meta_description', true );
            echo ! empty( $meta_desc ) ? esc_html( $meta_desc ) : '&mdash;';
        }
    }

    /**
     * Render the settings page.
     */
    public function render_settings_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields( 'sirpi_seo_manager_settings_group' );
                do_settings_sections( 'sirpi-seo-manager' );
                submit_button( __( 'Save Settings', 'sirpi-seo-manager' ) );
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Add SEO meta box to posts and pages.
     */
    public function add_seo_meta_boxes() {
        $post_types = get_post_types( array( 'public' => true ), 'names' );

        foreach ( $post_types as $post_type ) {
            add_meta_box(
                'sirpi-seo-manager-metabox',
                __( 'SEO Settings', 'sirpi-seo-manager' ),
                array( $this, 'render_seo_meta_box' ),
                $post_type,
                'normal',
                'high'
            );
        }
    }

    /**
     * Render the SEO meta box.
     *
     * @param WP_Post $post The post object.
     */
    public function render_seo_meta_box( $post ) {
        wp_nonce_field( 'sirpi_seo_manager_meta_nonce', 'sirpi_seo_manager_meta_nonce' );

        $meta_title       = get_post_meta( $post->ID, '_sirpi_meta_title', true );
        $meta_description = get_post_meta( $post->ID, '_sirpi_meta_description', true );
        $focus_keyword    = get_post_meta( $post->ID, '_sirpi_focus_keyword', true );
        $og_image_id      = get_post_meta( $post->ID, '_sirpi_og_image_id', true );
        $noindex          = get_post_meta( $post->ID, '_sirpi_noindex', true );
        $nofollow         = get_post_meta( $post->ID, '_sirpi_nofollow', true );
        $canonical_url    = get_post_meta( $post->ID, '_sirpi_canonical_url', true );
        ?>
        <div class="sirpi-seo-manager-metabox">
            <div class="sirpi-seo-field">
                <label for="sirpi_meta_title"><?php esc_html_e( 'SEO Title', 'sirpi-seo-manager' ); ?></label>
                <input type="text" id="sirpi_meta_title" name="sirpi_meta_title" value="<?php echo esc_attr( $meta_title ); ?>" class="large-text" placeholder="<?php echo esc_attr( wp_trim_words( get_the_title( $post ), 10 ) ); ?>" />
                <p class="description"><?php esc_html_e( 'Leave empty to use the default post title.', 'sirpi-seo-manager' ); ?></p>
                <div class="sirpi-seo-preview">
                    <strong><?php esc_html_e( 'Preview:', 'sirpi-seo-manager' ); ?></strong>
                    <span id="sirpi_title_preview"><?php echo esc_html( $this->get_meta_title( $post ) ); ?></span>
                </div>
            </div>

            <div class="sirpi-seo-field">
                <label for="sirpi_meta_description"><?php esc_html_e( 'Meta Description', 'sirpi-seo-manager' ); ?></label>
                <textarea id="sirpi_meta_description" name="sirpi_meta_description" rows="3" class="large-text" placeholder="<?php esc_attr_e( 'Enter a brief description...', 'sirpi-seo-manager' ); ?>" maxlength="160"><?php echo esc_textarea( $meta_description ); ?></textarea>
                <p class="description">
                    <span id="sirpi_desc_chars"><?php echo esc_html( strlen( $meta_description ) ); ?></span>/160 <?php esc_html_e( 'characters', 'sirpi-seo-manager' ); ?>
                </p>
            </div>

            <div class="sirpi-seo-field">
                <label for="sirpi_focus_keyword"><?php esc_html_e( 'Focus Keyword', 'sirpi-seo-manager' ); ?></label>
                <input type="text" id="sirpi_focus_keyword" name="sirpi_focus_keyword" value="<?php echo esc_attr( $focus_keyword ); ?>" class="regular-text" placeholder="<?php esc_attr_e( 'e.g., SEO plugin', 'sirpi-seo-manager' ); ?>" />
                <p class="description"><?php esc_html_e( 'Enter the main keyword you want this post to rank for.', 'sirpi-seo-manager' ); ?></p>
            </div>

            <div class="sirpi-seo-field">
                <label for="sirpi_og_image"><?php esc_html_e( 'Open Graph Image', 'sirpi-seo-manager' ); ?></label>
                <div class="sirpi-seo-image-upload">
                    <input type="hidden" id="sirpi_og_image_id" name="sirpi_og_image_id" value="<?php echo esc_attr( $og_image_id ); ?>" />
                    <div id="sirpi_og_image_preview">
                        <?php if ( $og_image_id ) : ?>
                            <?php echo wp_get_attachment_image( $og_image_id, 'medium' ); ?>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="button sirpi-upload-image-btn"><?php esc_html_e( 'Select Image', 'sirpi-seo-manager' ); ?></button>
                    <button type="button" class="button sirpi-remove-image-btn" <?php echo $og_image_id ? '' : 'style="display:none;"'; ?>><?php esc_html_e( 'Remove Image', 'sirpi-seo-manager' ); ?></button>
                </div>
                <p class="description"><?php esc_html_e( 'Recommended size: 1200x630 pixels.', 'sirpi-seo-manager' ); ?></p>
            </div>

            <div class="sirpi-seo-field">
                <label for="sirpi_canonical_url"><?php esc_html_e( 'Canonical URL', 'sirpi-seo-manager' ); ?></label>
                <input type="url" id="sirpi_canonical_url" name="sirpi_canonical_url" value="<?php echo esc_url( $canonical_url ); ?>" class="large-text" placeholder="<?php echo esc_url( get_permalink( $post ) ); ?>" />
                <p class="description"><?php esc_html_e( 'Override the default canonical URL if needed.', 'sirpi-seo-manager' ); ?></p>
            </div>

            <div class="sirpi-seo-field sirpi-seo-field-checkboxes">
                <label><?php esc_html_e( 'Robot Meta', 'sirpi-seo-manager' ); ?></label>
                <div class="sirpi-seo-checkboxes">
                    <label>
                        <input type="checkbox" name="sirpi_noindex" value="1" <?php checked( 1, $noindex ); ?> />
                        <?php esc_html_e( 'No Index', 'sirpi-seo-manager' ); ?>
                    </label>
                    <label>
                        <input type="checkbox" name="sirpi_nofollow" value="1" <?php checked( 1, $nofollow ); ?> />
                        <?php esc_html_e( 'No Follow', 'sirpi-seo-manager' ); ?>
                    </label>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Save SEO meta data.
     *
     * @param int $post_id The post ID.
     */
    public function save_seo_meta_data( $post_id ) {
        // Verify nonce.
        if ( ! isset( $_POST['sirpi_seo_manager_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sirpi_seo_manager_meta_nonce'] ) ), 'sirpi_seo_manager_meta_nonce' ) ) {
            return;
        }

        // Check autosave.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Save meta fields.
        $fields = array(
            '_sirpi_meta_title'       => isset( $_POST['sirpi_meta_title'] ) ? sanitize_text_field( wp_unslash( $_POST['sirpi_meta_title'] ) ) : '',
            '_sirpi_meta_description' => isset( $_POST['sirpi_meta_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['sirpi_meta_description'] ) ) : '',
            '_sirpi_focus_keyword'    => isset( $_POST['sirpi_focus_keyword'] ) ? sanitize_text_field( wp_unslash( $_POST['sirpi_focus_keyword'] ) ) : '',
            '_sirpi_og_image_id'      => isset( $_POST['sirpi_og_image_id'] ) ? absint( wp_unslash( $_POST['sirpi_og_image_id'] ) ) : '',
            '_sirpi_canonical_url'    => isset( $_POST['sirpi_canonical_url'] ) ? esc_url_raw( wp_unslash( $_POST['sirpi_canonical_url'] ) ) : '',
            '_sirpi_noindex'          => isset( $_POST['sirpi_noindex'] ) ? 1 : 0,
            '_sirpi_nofollow'         => isset( $_POST['sirpi_nofollow'] ) ? 1 : 0,
        );

        foreach ( $fields as $meta_key => $meta_value ) {
            if ( ! empty( $meta_value ) ) {
                update_post_meta( $post_id, $meta_key, $meta_value );
            } else {
                delete_post_meta( $post_id, $meta_key );
            }
        }
    }

    /**
     * Filter the document title to use SEO custom titles.
     *
     * @param string $title The current document title.
     * @return string The filtered title.
     */
    public function filter_document_title( $title ) {
        $seo_title = $this->get_meta_title();
        if ( ! empty( $seo_title ) ) {
            return $seo_title;
        }
        return $title;
    }

    /**
     * Get the SEO meta title for a post.
     *
     * @param WP_Post $post The post object.
     * @return string The meta title.
     */
    public function get_meta_title( $post = null ) {
        if ( ! $post ) {
            global $post;
        }

        $options   = get_option( 'sirpi_seo_manager_settings' );
        $separator = isset( $options['separator'] ) ? ' ' . $options['separator'] . ' ' : ' | ';
        $site_name = get_bloginfo( 'name' );

        if ( is_front_page() || is_home() ) {
            $title = ! empty( $options['home_title'] ) ? $options['home_title'] : $site_name;
            return $title;
        }

        if ( $post && is_singular() ) {
            $meta_title = get_post_meta( $post->ID, '_sirpi_meta_title', true );
            if ( ! empty( $meta_title ) ) {
                return $meta_title;
            }
            return get_the_title( $post->ID ) . $separator . $site_name;
        }

        if ( is_category() || is_tag() || is_tax() ) {
            $queried_object = get_queried_object();
            if ( $queried_object && isset( $queried_object->name ) ) {
                return $queried_object->name . $separator . $site_name;
            }
        }

        if ( is_search() ) {
            /* translators: %s: Search query. */
            return sprintf( __( 'Search Results for "%s"', 'sirpi-seo-manager' ), get_search_query() ) . $separator . $site_name;
        }

        if ( is_404() ) {
            return __( 'Page Not Found', 'sirpi-seo-manager' ) . $separator . $site_name;
        }

        // Fallback: avoid calling wp_get_document_title() to prevent infinite recursion
        // with the pre_get_document_title filter.
        return $site_name;
    }

    /**
     * Get the meta description for a page.
     *
     * @return string The meta description.
     */
    public function get_meta_description() {
        $options          = get_option( 'sirpi_seo_manager_settings' );
        $site_description = get_bloginfo( 'description' );

        if ( is_front_page() || is_home() ) {
            return ! empty( $options['home_description'] ) ? $options['home_description'] : $site_description;
        }

        if ( is_singular() ) {
            global $post;
            $meta_desc = get_post_meta( $post->ID, '_sirpi_meta_description', true );
            if ( ! empty( $meta_desc ) ) {
                return $meta_desc;
            }

            // Use post excerpt or first 160 characters of content.
            $excerpt = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_trim_words( wp_strip_all_tags( $post->post_content ), 30, '' );
            return substr( $excerpt, 0, 160 );
        }

        if ( is_category() || is_tag() || is_tax() ) {
            $queried_object = get_queried_object();
            $description    = term_description( $queried_object->term_id );
            return ! empty( $description ) ? substr( wp_strip_all_tags( $description ), 0, 160 ) : $site_description;
        }

        return $site_description;
    }

    /**
     * Render SEO meta tags in the head section.
     */
    public function render_meta_tags() {
        $options = get_option( 'sirpi_seo_manager_settings' );
        if ( empty( $options['enable_meta_tags'] ) ) {
            return;
        }

        $description = $this->get_meta_description();
        $keywords    = isset( $options['meta_keywords'] ) ? $options['meta_keywords'] : '';

        if ( ! empty( $description ) ) {
            echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
        }

        if ( ! empty( $keywords ) ) {
            echo '<meta name="keywords" content="' . esc_attr( $keywords ) . '" />' . "\n";
        }

        // Render robots meta tag.
        $noindex  = false;
        $nofollow = false;

        if ( is_singular() ) {
            global $post;
            $noindex  = get_post_meta( $post->ID, '_sirpi_noindex', true );
            $nofollow = get_post_meta( $post->ID, '_sirpi_nofollow', true );
        }

        if ( is_404() || is_search() ) {
            $noindex = true;
        }

        $robots_content = '';
        if ( $noindex ) {
            $robots_content .= 'noindex';
        }
        if ( $nofollow ) {
            $robots_content .= ! empty( $robots_content ) ? ', nofollow' : 'nofollow';
        }

        if ( ! empty( $robots_content ) ) {
            echo '<meta name="robots" content="' . esc_attr( $robots_content ) . '" />' . "\n";
        }

        if ( is_singular() ) {
            global $post;
            $focus_keyword = get_post_meta( $post->ID, '_sirpi_focus_keyword', true );
            if ( ! empty( $focus_keyword ) ) {
                echo '<meta name="keywords" content="' . esc_attr( $focus_keyword ) . '" />' . "\n";
            }
        }

        // Verify site ownership meta tags.
        $google_verify = isset( $options['google_verify'] ) ? $options['google_verify'] : '';
        $bing_verify   = isset( $options['bing_verify'] ) ? $options['bing_verify'] : '';

        if ( ! empty( $google_verify ) ) {
            echo '<meta name="google-site-verification" content="' . esc_attr( $google_verify ) . '" />' . "\n";
        }

        if ( ! empty( $bing_verify ) ) {
            echo '<meta name="msvalidate.01" content="' . esc_attr( $bing_verify ) . '" />' . "\n";
        }
    }

    /**
     * Render Open Graph tags.
     */
    public function render_open_graph_tags() {
        $options = get_option( 'sirpi_seo_manager_settings' );
        if ( empty( $options['enable_open_graph'] ) ) {
            return;
        }

        $title       = $this->get_meta_title();
        $description = $this->get_meta_description();
        $url         = get_permalink();
        $site_name   = get_bloginfo( 'name' );

        echo "\n<!-- Open Graph Tags -->\n";
        echo '<meta property="og:locale" content="' . esc_attr( get_locale() ) . '" />' . "\n";
        echo '<meta property="og:type" content="website" />' . "\n";
        echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
        echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
        echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '" />' . "\n";

        if ( is_singular() ) {
            global $post;
            $og_image_id = get_post_meta( $post->ID, '_sirpi_og_image_id', true );

            if ( $og_image_id ) {
                $image = wp_get_attachment_image_src( $og_image_id, 'full' );
                if ( $image ) {
                    echo '<meta property="og:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                    echo '<meta property="og:image:width" content="' . esc_attr( $image[1] ) . '" />' . "\n";
                    echo '<meta property="og:image:height" content="' . esc_attr( $image[2] ) . '" />' . "\n";
                }
            } elseif ( has_post_thumbnail( $post->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                if ( $image ) {
                    echo '<meta property="og:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                    echo '<meta property="og:image:width" content="' . esc_attr( $image[1] ) . '" />' . "\n";
                    echo '<meta property="og:image:height" content="' . esc_attr( $image[2] ) . '" />' . "\n";
                }
            }

            echo '<meta property="og:type" content="article" />' . "\n";
            echo '<meta property="article:published_time" content="' . esc_attr( get_the_time( 'c', $post->ID ) ) . '" />' . "\n";
            echo '<meta property="article:modified_time" content="' . esc_attr( get_the_modified_time( 'c', $post->ID ) ) . '" />' . "\n";
        } else {
            // Use site logo for non-singular pages.
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            if ( $custom_logo_id ) {
                $image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                if ( $image ) {
                    echo '<meta property="og:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                }
            }
        }

        echo "<!-- End Open Graph Tags -->\n\n";
    }

    /**
     * Render Twitter Card tags.
     */
    public function render_twitter_card_tags() {
        $options = get_option( 'sirpi_seo_manager_settings' );
        if ( empty( $options['enable_twitter_cards'] ) ) {
            return;
        }

        $title       = $this->get_meta_title();
        $description = $this->get_meta_description();
        $card_type   = 'summary_large_image';

        echo "\n<!-- Twitter Card Tags -->\n";
        echo '<meta name="twitter:card" content="' . esc_attr( $card_type ) . '" />' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '" />' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '" />' . "\n";

        // Twitter handle from settings.
        $twitter_handle = isset( $options['twitter_handle'] ) ? $options['twitter_handle'] : '';
        if ( ! empty( $twitter_handle ) ) {
            echo '<meta name="twitter:site" content="' . esc_attr( $twitter_handle ) . '" />' . "\n";
            echo '<meta name="twitter:creator" content="' . esc_attr( $twitter_handle ) . '" />' . "\n";
        }

        if ( is_singular() ) {
            global $post;
            $og_image_id = get_post_meta( $post->ID, '_sirpi_og_image_id', true );

            if ( $og_image_id ) {
                $image = wp_get_attachment_image_src( $og_image_id, 'full' );
                if ( $image ) {
                    echo '<meta name="twitter:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                }
            } elseif ( has_post_thumbnail( $post->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                if ( $image ) {
                    echo '<meta name="twitter:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                }
            }
        } else {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            if ( $custom_logo_id ) {
                $image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                if ( $image ) {
                    echo '<meta name="twitter:image" content="' . esc_url( $image[0] ) . '" />' . "\n";
                }
            }
        }

        echo "<!-- End Twitter Card Tags -->\n\n";
    }

    /**
     * Render canonical URL tag.
     */
    public function render_canonical_url() {
        $canonical = '';

        if ( is_singular() ) {
            global $post;
            $custom_canonical = get_post_meta( $post->ID, '_sirpi_canonical_url', true );
            $canonical        = ! empty( $custom_canonical ) ? $custom_canonical : get_permalink( $post->ID );
        } elseif ( is_category() || is_tag() || is_tax() ) {
            $canonical = get_term_link( get_queried_object() );
        } elseif ( is_search() ) {
            $canonical = get_search_link( get_search_query() );
        } elseif ( is_home() || is_front_page() ) {
            $canonical = home_url( '/' );
        } elseif ( is_author() ) {
            $canonical = get_author_posts_url( get_the_author_meta( 'ID' ) );
        }

        if ( ! empty( $canonical ) ) {
            echo '<link rel="canonical" href="' . esc_url( $canonical ) . '" />' . "\n";
        }
    }

    /**
     * Initialize sitemap rewrite rules.
     */
    public function init_sitemap() {
        // Main sitemap: /sitemap.xml.
        add_rewrite_rule(
            'sitemap\.xml$',
            'index.php?sirpi_sitemap=1&sirpi_sitemap_type=main',
            'top'
        );

        // Sitemap index: /sitemap-index.xml.
        add_rewrite_rule(
            'sitemap-index\.xml$',
            'index.php?sirpi_sitemap=1&sirpi_sitemap_type=index',
            'top'
        );

        // Individual sitemaps: /sitemap-{post_type}.xml or /sitemap-{taxonomy}.xml.
        add_rewrite_rule(
            'sitemap-([a-z0-9_-]+)\.xml$',
            'index.php?sirpi_sitemap=1&sirpi_sitemap_type=$matches[1]',
            'top'
        );

        add_rewrite_tag( '%sirpi_sitemap%', '([0-9]+)' );
        add_rewrite_tag( '%sirpi_sitemap_type%', '([a-z0-9_]+)' );
    }

    /**
     * Handle sitemap request.
     */
    public function handle_sitemap_request() {
        $options = get_option( 'sirpi_seo_manager_settings' );
        if ( empty( $options['enable_sitemap'] ) ) {
            return;
        }

        if ( get_query_var( 'sirpi_sitemap' ) ) {
            $this->generate_sitemap();
            exit;
        }
    }

    /**
     * Generate and output the XML sitemap.
     */
    public function generate_sitemap() {
        global $wpdb;

        header( 'Content-Type: application/xml; charset=utf-8' );
        header( 'X-Robots-Tag: noindex, follow' );

        $sitemap_type = get_query_var( 'sirpi_sitemap_type' );
        $post_types   = get_post_types( array( 'public' => true ), 'names' );
        $excluded     = array( 'attachment' );

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        // --- Sitemap Index ---
        if ( 'index' === $sitemap_type ) {
            echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            foreach ( $post_types as $post_type ) {
                if ( in_array( $post_type, $excluded, true ) ) {
                    continue;
                }

                $post_type_obj = get_post_type_object( $post_type );
                if ( ! $post_type_obj || ! $post_type_obj->public ) {
                    continue;
                }

                $cache_key = 'sirpi_sitemap_count_' . $post_type;
                $count     = wp_cache_get( $cache_key, 'sirpi-seo-manager' );

                if ( false === $count ) {
                    $count = (int) $wpdb->get_var( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
                        $wpdb->prepare(
                            "SELECT COUNT(ID) FROM {$wpdb->posts} WHERE post_type = %s AND post_status = 'publish'",
                            $post_type
                        )
                    );
                    wp_cache_set( $cache_key, $count, 'sirpi-seo-manager', HOUR_IN_SECONDS );
                }

                if ( $count > 0 ) {
                    echo "\t<sitemap>\n";
                    echo "\t\t<loc>" . esc_url( home_url( '/sitemap-' . $post_type . '.xml' ) ) . "</loc>\n";
                    echo "\t\t<lastmod>" . esc_html( current_time( 'c' ) ) . "</lastmod>\n";
                    echo "\t</sitemap>\n";
                }
            }

            // Add taxonomy sitemaps.
            $taxonomies = get_taxonomies( array( 'public' => true ), 'names' );
            foreach ( $taxonomies as $taxonomy ) {
                $terms = get_terms(
                    array(
                        'taxonomy'   => $taxonomy,
                        'hide_empty' => true,
                    )
                );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    echo "\t<sitemap>\n";
                    echo "\t\t<loc>" . esc_url( home_url( '/sitemap-' . $taxonomy . '.xml' ) ) . "</loc>\n";
                    echo "\t\t<lastmod>" . esc_html( current_time( 'c' ) ) . "</lastmod>\n";
                    echo "\t</sitemap>\n";
                }
            }

            echo '</sitemapindex>';
            exit;
        }

        // --- Main sitemap (homepage + all public posts) ---
        if ( 'main' === $sitemap_type || empty( $sitemap_type ) ) {
            echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            // Homepage.
            echo "\t<url>\n";
            echo "\t\t<loc>" . esc_url( home_url( '/' ) ) . "</loc>\n";
            echo "\t\t<priority>1.0</priority>\n";
            echo "\t\t<changefreq>daily</changefreq>\n";
            echo "\t</url>\n";

            // Posts from all public post types (paginated for performance).
            $all_post_types = array_values( array_diff( $post_types, $excluded ) );
            $paged          = 1;
            $posts_per_page = 1000;

            while ( true ) {
                $posts = get_posts(
                    array(
                        'post_type'      => $all_post_types,
                        'post_status'    => 'publish',
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $paged,
                        'fields'         => 'ids',
                    )
                );

                if ( empty( $posts ) ) {
                    break;
                }

                foreach ( $posts as $post_id ) {
                    $modified = get_the_modified_time( 'c', $post_id );
                    echo "\t<url>\n";
                    echo "\t\t<loc>" . esc_url( get_permalink( $post_id ) ) . "</loc>\n";
                    echo "\t\t<lastmod>" . esc_html( $modified ) . "</lastmod>\n";
                    echo "\t\t<priority>0.8</priority>\n";
                    echo "\t\t<changefreq>weekly</changefreq>\n";
                    echo "\t</url>\n";
                }

                ++$paged;
            }

            echo '</urlset>';
            exit;
        }

        // --- Individual post type sitemap: /sitemap-{post_type}.xml ---
        if ( in_array( $sitemap_type, $post_types, true ) ) {
            echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            $paged          = 1;
            $posts_per_page = 1000;

            while ( true ) {
                $posts = get_posts(
                    array(
                        'post_type'      => $sitemap_type,
                        'post_status'    => 'publish',
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $paged,
                        'fields'         => 'ids',
                    )
                );

                if ( empty( $posts ) ) {
                    break;
                }

                foreach ( $posts as $post_id ) {
                    $modified = get_the_modified_time( 'c', $post_id );
                    echo "\t<url>\n";
                    echo "\t\t<loc>" . esc_url( get_permalink( $post_id ) ) . "</loc>\n";
                    echo "\t\t<lastmod>" . esc_html( $modified ) . "</lastmod>\n";
                    echo "\t\t<priority>0.8</priority>\n";
                    echo "\t\t<changefreq>weekly</changefreq>\n";
                    echo "\t</url>\n";
                }

                ++$paged;
            }

            echo '</urlset>';
            exit;
        }

        // --- Taxonomy sitemap: /sitemap-{taxonomy}.xml ---
        $taxonomies = get_taxonomies( array( 'public' => true ), 'names' );
        if ( in_array( $sitemap_type, $taxonomies, true ) ) {
            echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            $terms = get_terms(
                array(
                    'taxonomy'   => $sitemap_type,
                    'hide_empty' => true,
                    'fields'     => 'ids',
                )
            );

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term_id ) {
                    $term_link = get_term_link( (int) $term_id, $sitemap_type );
                    if ( is_wp_error( $term_link ) ) {
                        continue;
                    }

                    echo "\t<url>\n";
                    echo "\t\t<loc>" . esc_url( $term_link ) . "</loc>\n";
                    echo "\t\t<priority>0.5</priority>\n";
                    echo "\t\t<changefreq>weekly</changefreq>\n";
                    echo "\t</url>\n";
                }
            }

            echo '</urlset>';
            exit;
        }

        // Fallback: return 404 for unknown sitemap types.
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        exit;
    }

    /**
     * Generate breadcrumbs.
     *
     * @return string Breadcrumb HTML.
     */
    public function generate_breadcrumbs() {
        $options = get_option( 'sirpi_seo_manager_settings' );
        if ( empty( $options['enable_breadcrumbs'] ) ) {
            return '';
        }

        $breadcrumbs = array();
        $separator   = isset( $options['separator'] ) ? $options['separator'] : '|';
        $home_title  = isset( $options['home_title'] ) ? $options['home_title'] : get_bloginfo( 'name' );

        // Home link.
        $breadcrumbs[] = '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( $home_title ) . '</a>';

        if ( is_singular() ) {
            $post_type     = get_post_type();
            $post_type_obj = get_post_type_object( $post_type );

            if ( $post_type_obj && $post_type_obj->has_archive ) {
                $archive_link  = get_post_type_archive_link( $post_type );
                $breadcrumbs[] = '<a href="' . esc_url( $archive_link ) . '">' . esc_html( $post_type_obj->labels->name ) . '</a>';
            }

            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $breadcrumbs[] = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }

            $breadcrumbs[] = '<span class="current">' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_category() ) {
            $breadcrumbs[] = '<span class="current">' . esc_html( single_cat_title( '', false ) ) . '</span>';
        } elseif ( is_tag() ) {
            $breadcrumbs[] = '<span class="current">' . esc_html( single_tag_title( '', false ) ) . '</span>';
        } elseif ( is_search() ) {
            /* translators: %s: Search query. */
            $breadcrumbs[] = '<span class="current">' . sprintf( __( 'Search: %s', 'sirpi-seo-manager' ), esc_html( get_search_query() ) ) . '</span>';
        } elseif ( is_404() ) {
            $breadcrumbs[] = '<span class="current">' . __( 'Page Not Found', 'sirpi-seo-manager' ) . '</span>';
        } elseif ( is_author() ) {
            $breadcrumbs[] = '<span class="current">' . esc_html( get_the_author() ) . '</span>';
        }

        $output  = '<nav class="sirpi-breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">';
        $output .= '<span class="breadcrumb-label">' . __( 'You are here:', 'sirpi-seo-manager' ) . '</span> ';

        $total = count( $breadcrumbs );
        foreach ( $breadcrumbs as $index => $crumb ) {
            $output .= $crumb;
            if ( $index < $total - 1 ) {
                $output .= ' <span class="separator">' . esc_html( $separator ) . '</span> ';
            }
        }

        $output .= '</nav>';

        return $output;
    }

    /**
     * Get the focus keyword for a post.
     *
     * @param int $post_id The post ID.
     * @return string|false The focus keyword or false if not set.
     */
    public function get_focus_keyword( $post_id = 0 ) {
        if ( 0 === $post_id ) {
            $post_id = get_the_ID();
        }

        if ( ! $post_id ) {
            return false;
        }

        return get_post_meta( $post_id, '_sirpi_focus_keyword', true );
    }
}

/**
 * Initialize the plugin.
 *
 * @return SIRPI_SEO_Manager
 */
function sirpi_seo_manager_init() {
    return SIRPI_SEO_Manager::get_instance();
}

// Start the plugin.
sirpi_seo_manager_init();

/**
 * Template tag: Display breadcrumbs.
 */
function sirpi_breadcrumbs() {
    $plugin = SIRPI_SEO_Manager::get_instance();
    echo wp_kses_post( $plugin->generate_breadcrumbs() );
}

/**
 * Template tag: Get the current page title.
 *
 * @return string
 */
function sirpi_title() {
    $plugin = SIRPI_SEO_Manager::get_instance();
    return esc_html( $plugin->get_meta_title() );
}

/**
 * Template tag: Get the current meta description.
 *
 * @return string
 */
function sirpi_description() {
    $plugin = SIRPI_SEO_Manager::get_instance();
    return esc_html( $plugin->get_meta_description() );
}

/**
 * Template tag: Get the focus keyword.
 *
 * @param int $post_id Optional. Post ID. Default 0.
 * @return string|false
 */
function sirpi_focus_keyword( $post_id = 0 ) {
    $plugin = SIRPI_SEO_Manager::get_instance();
    return esc_html( $plugin->get_focus_keyword( $post_id ) );
}

