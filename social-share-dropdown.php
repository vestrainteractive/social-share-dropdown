<?php
/*
Plugin Name: Social Share Dropdown
Plugin URI: https://github.com/vestrainteractive/social-share-dropdown
Description: Adds a dropdown menu with social network share links and a copy URL feature.
Version: 1.0
Author: Vestra Interactive
Author URI: https://vestrainteractive.com
License: GPL-3.0+
*/

function social_share_dropdown_enqueue_scripts() {
    // Enqueue JavaScript, CSS, and icons
    wp_enqueue_script('social-share-dropdown', plugin_dir_url(__FILE__) . 'social-share-dropdown.js', array('jquery'), '1.0', true);
    wp_enqueue_style('social-share-dropdown', plugin_dir_url(__FILE__) . 'social-share-dropdown.css');
}
add_action('wp_enqueue_scripts', 'social_share_dropdown_enqueue_scripts');

function social_share_dropdown_html($atts) {
    global $post;
    if (is_single()) {
        $post_url = urlencode(get_permalink($post->ID));
        return '<div class="social-share-dropdown">
                    <a href="#" class="share-toggle">Share this post</a>
                    <div class="share-menu">
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=' . $post_url . '" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/facebook.svg" alt="Facebook">
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=' . $post_url . '" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/twitter.svg" alt="Twitter">
                            </a>
                            <a href="https://www.reddit.com/submit?url=' . $post_url . '" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/reddit.svg" alt="Reddit">
                            </a>
                            <a href="https://www.youtube.com/" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/youtube.svg" alt="YouTube">
                            </a>
                            <a href="https://mastodon.social/share?text=' . $post_url . '" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/mastodon.svg" alt="Mastodon">
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="' . plugin_dir_url(__FILE__) . 'icons/instagram.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="copy-url">
                            <input type="text" value="' . get_permalink($post->ID) . '" readonly>
                            <button class="copy-btn">Copy</button>
                        </div>
                    </div>
                </div>';
    }
    return '';
}
add_shortcode('social_share_dropdown', 'social_share_dropdown_html');
