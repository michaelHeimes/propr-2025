<?php
add_theme_support( 'editor-font-sizes', array(
	[
		'name' => __( 'Small', 'textdomain' ),
		'shortName' => __( 'S', 'textdomain' ),
		'slug' => 'small',
		'size' => 'clamp(0.938rem, 0.871rem + 0.282vw, 1.125rem)',
	],
	[
		'name' => __( 'Medium', 'textdomain' ),
		'shortName' => __( 'M', 'textdomain' ),
		'slug' => 'medium',
		'size' => 'clamp(1.125rem, 0.861rem + 1.127vw, 1.875rem)',
	],
	[
		'name' => __( 'Large', 'textdomain' ),
		'shortName' => __( 'L', 'textdomain' ),
		'slug' => 'large',
		'size' => 'clamp(2.188rem, 1.857rem + 1.408vw, 3.125rem)',
	],
) );