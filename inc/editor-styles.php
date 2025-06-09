<?php
// Adds your styles to the WordPress editor (classic)
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/styles/style.min.css' );
}

// Enqueue styles for the block editor and widgets screen
function trailhead_enqueue_block_editor_styles() {
	wp_enqueue_style(
		'trailhead-blocks-style',
		get_template_directory_uri() . '/assets/styles/editor.css',
		array(),
		_S_VERSION
	);
}
add_action( 'enqueue_block_assets', 'trailhead_enqueue_block_editor_styles' );

// Enqueue Typekit for admin and block editor (including widgets)
function enqueue_typekit_font_editor() {
	wp_enqueue_style( 'trailhead-typekit-editor', 'https://use.typekit.net/dqb6ktk.css', array(), null );
}
add_action( 'admin_enqueue_scripts', 'enqueue_typekit_font_editor' );
add_action( 'enqueue_block_assets', 'enqueue_typekit_font_editor' );
