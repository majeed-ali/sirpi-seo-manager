/**
 * SEO Manager - Admin JavaScript
 *
 * Handles meta box interactions: image upload, character counting,
 * title preview, and settings page enhancements.
 *
 * @package SIRPI_SEO_Manager
 */

(function($) {
    'use strict';

    /**
     * SEO Meta Box functionality.
     */
    var SIRPI_Metabox = {

        /**
         * Initialize meta box functionality.
         */
        init: function() {
            this.bindEvents();
            this.initCharacterCount();
            this.initTitlePreview();
            this.initImageUpload();
        },

        /**
         * Bind event handlers.
         */
        bindEvents: function() {
            var self = this;

            // Character count update on input.
            $('#sirpi_meta_description').on('keyup change', function() {
                self.updateCharacterCount($(this));
            });

            // Title preview update on input.
            $('#sirpi_meta_title').on('keyup change', function() {
                self.updateTitlePreview();
            });

            // Listen for post title changes too.
            $('#title').on('keyup change', function() {
                self.updateTitlePreview();
            });
        },

        /**
         * Initialize character count display.
         */
        initCharacterCount: function() {
            var $desc = $('#sirpi_meta_description');
            if ($desc.length) {
                this.updateCharacterCount($desc);
            }
        },

        /**
         * Update character count and visual indicator.
         *
         * @param {jQuery} $el The description textarea element.
         */
        updateCharacterCount: function($el) {
            var count = $el.val().length;
            var $counter = $('#sirpi_desc_chars');
            var maxLength = 160;

            $counter.text(count);

            // Remove existing classes.
            $counter.removeClass('valid warning');

            if (count === 0) {
                $counter.css('color', '#d63638'); // Red
            } else if (count <= maxLength) {
                $counter.addClass('valid').css('color', '#00a32a'); // Green
            } else {
                $counter.addClass('warning').css('color', '#dba617'); // Orange
            }
        },

        /**
         * Initialize title preview functionality.
         */
        initTitlePreview: function() {
            this.updateTitlePreview();
        },

        /**
         * Update the title preview with current values.
         */
        updateTitlePreview: function() {
            var $preview = $('#sirpi_title_preview');
            if (!$preview.length) {
                return;
            }

            var $metaTitle = $('#sirpi_meta_title');
            var $postTitle = $('#title');
            var separator = ' | ';
            var siteName = $('body').data('wp-site-name') || '';

            // Try to get site name from localized data.
            if (typeof sirpiAdmin !== 'undefined' && sirpiAdmin.siteName) {
                siteName = sirpiAdmin.siteName;
            }

            var title = '';

            if ($metaTitle.val().trim() !== '') {
                title = $metaTitle.val().trim();
            } else if ($postTitle.val().trim() !== '') {
                title = $postTitle.val().trim();
            } else {
                title = $preview.data('default-title') || 'Post Title';
            }

            // Append site name for preview.
            if (title && siteName) {
                title = title + separator + siteName;
            }

            $preview.text(title);
        },

        /**
         * Initialize media uploader for Open Graph image.
         */
        initImageUpload: function() {
            var self = this;
            var frame;

            // Upload button.
            $('.sirpi-upload-image-btn').on('click', function(e) {
                e.preventDefault();

                var $btn = $(this);
                var $container = $btn.closest('.sirpi-seo-image-upload');
                var $input = $container.find('#sirpi_og_image_id');
                var $preview = $container.find('#sirpi_og_image_preview');
                var $removeBtn = $container.find('.sirpi-remove-image-btn');

                // Create the media frame if it doesn't exist.
                if (frame) {
                    frame.open();
                    return;
                }

                // Create the media frame.
                frame = wp.media({
                    title: sirpiAdmin ? sirpiAdmin.mediaTitle : 'Select Image',
                    button: {
                        text: sirpiAdmin ? sirpiAdmin.mediaButton : 'Use Image'
                    },
                    multiple: false,
                    library: {
                        type: 'image'
                    }
                });

                // When an image is selected.
                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();

                    // Set the input value.
                    $input.val(attachment.id);

                    // Show the preview.
                    var imgHtml = '<img src="' + attachment.sizes.medium.url + '" alt="' + attachment.alt + '" />';
                    $preview.html(imgHtml);

                    // Show remove button.
                    $removeBtn.show();

                    // Trigger change event.
                    $input.trigger('change');
                });

                frame.open();
            });

            // Remove image button.
            $('.sirpi-remove-image-btn').on('click', function(e) {
                e.preventDefault();

                var $btn = $(this);
                var $container = $btn.closest('.sirpi-seo-image-upload');
                var $input = $container.find('#sirpi_og_image_id');
                var $preview = $container.find('#sirpi_og_image_preview');

                // Clear values.
                $input.val('');
                $preview.empty();
                $btn.hide();

                // Trigger change event.
                $input.trigger('change');
            });

            // Handle existing image removal when media is deleted.
            $(document).on('ajaxSuccess', function(event, xhr, settings) {
                if (settings.action === 'delete-post') {
                    var $container = $('.sirpi-remove-image-btn').closest('.sirpi-seo-image-upload');
                    $container.find('#sirpi_og_image_id').val('');
                    $container.find('#sirpi_og_image_preview').empty();
                    $container.find('.sirpi-remove-image-btn').hide();
                }
            });
        }
    };

    /**
     * SEO Settings page functionality.
     */
    var SIRPI_Settings = {

        /**
         * Initialize settings page functionality.
         */
        init: function() {
            this.bindEvents();
        },

        /**
         * Bind event handlers for settings page.
         */
        bindEvents: function() {
            var self = this;

            // Toggle dependent settings.
            $('#enable_meta_tags').on('change', function() {
                self.toggleSettingsVisibility();
            });

            $('#enable_open_graph').on('change', function() {
                self.toggleSettingsVisibility();
            });

            $('#enable_twitter_cards').on('change', function() {
                self.toggleSettingsVisibility();
            });

            // Initial state.
            this.toggleSettingsVisibility();
        },

        /**
         * Show/hide dependent settings based on toggles.
         */
        toggleSettingsVisibility: function() {
            // Meta tags dependent fields.
            var $metaTags = $('#enable_meta_tags');
            var $homeTitle = $metaTags.closest('table').find('tr:has(#home_title)');
            var $homeDesc = $metaTags.closest('table').find('tr:has(#home_description)');
            var $separator = $metaTags.closest('table').find('tr:has(#separator)');

            if ($metaTags.is(':checked')) {
                $homeTitle.show();
                $homeDesc.show();
                $separator.show();
            } else {
                $homeTitle.hide();
                $homeDesc.hide();
                $separator.hide();
            }
        }
    };

    /**
     * Character counter for description field.
     */
    var SIRPI_DescriptionCounter = {

        /**
         * Initialize description counter.
         */
        init: function() {
            var $desc = $('#sirpi_meta_description');
            if ($desc.length) {
                $desc.on('input', function() {
                    var max = parseInt($(this).attr('maxlength'), 10) || 160;
                    var len = $(this).val().length;
                    var $counter = $('#sirpi_desc_chars');

                    $counter.text(len);

                    if (len > max) {
                        $counter.css('color', '#d63638');
                    } else if (len > max * 0.8) {
                        $counter.css('color', '#dba617');
                    } else {
                        $counter.css('color', '#00a32a');
                    }
                });
            }
        }
    };

    /**
     * Initialize all modules on document ready.
     */
    $(document).ready(function() {
        // Check if we're on a post edit screen.
        if ($('#sirpi_meta_title').length || $('#sirpi_meta_description').length) {
            SIRPI_Metabox.init();
        }

        // Check if we're on the settings page.
        if ($('#enable_meta_tags').length) {
            SIRPI_Settings.init();
        }

        // Initialize description counter.
        SIRPI_DescriptionCounter.init();

        // Tab functionality for future use.
        $('.sirpi-seo-tab').on('click', function() {
            var $tab = $(this);
            var target = $tab.data('tab');

            // Deactivate all tabs.
            $tab.closest('.sirpi-seo-tabs').find('.sirpi-seo-tab').removeClass('active');
            $tab.closest('.sirpi-seo-manager-metabox').find('.sirpi-seo-tab-content').removeClass('active');

            // Activate selected tab.
            $tab.addClass('active');
            $('#' + target).addClass('active');
        });
    });

})(jQuery);