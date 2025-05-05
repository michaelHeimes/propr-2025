<?php
// Adds your styles to the WordPress editor
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/styles/style.min.css' );
}

/**
 * Enqueue styles for the block editor.
 */
function trailhead_enqueue_block_editor_styles() {
	wp_enqueue_style(
		'trailhead-style-min',
		get_template_directory_uri() . '/assets/styles/editor.css',
		array(),
		_S_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'trailhead_enqueue_block_editor_styles' );

function enqueue_typekit_font_editor() {
	// Admin and block editor
	wp_enqueue_style( 'trailhead-typekit-editor', 'https://use.typekit.net/dqb6ktk.css', array(), null );
}
add_action( 'admin_enqueue_scripts', 'enqueue_typekit_font_editor' );
add_action( 'enqueue_block_editor_assets', 'enqueue_typekit_font_editor' );