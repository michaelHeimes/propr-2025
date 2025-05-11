<?php
add_theme_support( 'editor-font-sizes', array(
	[
		'name' => __( 'Small', 'textdomain' ),
		'shortName' => __( 'S', 'textdomain' ),
		'slug' => 'small',
		'size' => 'clamp(0.938rem, 0.893rem + 0.194vw, 1.125rem)',
	],
	[
		'name' => __( 'Medium', 'textdomain' ),
		'shortName' => __( 'M', 'textdomain' ),
		'slug' => 'medium',
		'size' => 'clamp(1.125rem, 0.943rem + 0.777vw, 1.875rem)',
	],
	[
		'name' => __( 'Large', 'textdomain' ),
		'shortName' => __( 'L', 'textdomain' ),
		'slug' => 'large',
		'size' => 'clamp(2.188rem, 1.961rem + 0.97vw, 3.125rem)',
	],
) );

add_filter('render_block', function($block_content, $block) {
	if (!isset($block['blockName']) || $block['blockName'] !== 'core/button') {
		return $block_content;
	}

	// Load HTML
	$doc = new DOMDocument();
	libxml_use_internal_errors(true);
	$doc->loadHTML(mb_convert_encoding($block_content, 'HTML-ENTITIES', 'UTF-8'));

	$links = $doc->getElementsByTagName('a');
	foreach ($links as $link) {
		if ($link->hasAttribute('class') && strpos($link->getAttribute('class'), 'wp-block-button__link') !== false) {
			$text = $link->textContent;
			$span = $doc->createElement('span', $text);
			while ($link->firstChild) {
				$link->removeChild($link->firstChild);
			}
			$link->appendChild($span);
		}
	}

	$body = $doc->getElementsByTagName('body')->item(0);
	return $doc->saveHTML($body->firstChild);
}, 10, 2);